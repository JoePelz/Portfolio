//globals?
var canvas;
var ctx;
var canvas2;
var ctx2;
var canvasOffscreen
var ctxOffscreen;
var resultData;

var bg;
var x1, y1;
var x2, y2;
var x3, y3;
var xm, ym;
var mdown;
var selected;
var offsetX, offsetY;
var radius = 10;
var threshold = 400; //20 squared

function init() {
  canvas = document.getElementById("canvasOverlay");
  ctx = canvas.getContext("2d");
  canvas2 = document.getElementById("canvasResult");
  ctx2 = canvas2.getContext("2d");
  bg = document.getElementById("backgroundImage");

  canvasOffscreen = document.createElement("canvas");
  canvasOffscreen.width = 480;
  canvasOffscreen.height = 320;
  ctxOffscreen = canvasOffscreen.getContext("2d");
  resultData = ctx2.getImageData(0,0,canvas2.width, canvas2.height);


  x1 = 120;
  y1 = 120;
  x2 = 240;
  y2 = 120;
  x3 = 180;
  y3 = 200;
  mdown = false;
  selected = 0;

  canvas.addEventListener('mousemove', mousemove);
  canvas.addEventListener('mousedown', mousedown);
  canvas.addEventListener('mouseup', mouseup);
  paintCanvas();
}

function mousedown(event) {
  xm = event.layerX;
  ym = event.layerY;

  if (((x1 - xm) * (x1 - xm) + (y1 - ym) * (y1 - ym)) < threshold) {
    mdown = true;
    selected = 1;
    offsetX = x1 - xm;
    offsetY = y1 - ym;
  } else if (((x2 - xm) * (x2 - xm) + (y2 - ym) * (y2 - ym)) < threshold) {
    mdown = true;
    selected = 2;
    offsetX = x2 - xm;
    offsetY = y2 - ym;
  } else if (((x3 - xm) * (x3 - xm) + (y3 - ym) * (y3 - ym)) < threshold) {
    mdown = true;
    selected = 3;
    offsetX = x3 - xm;
    offsetY = y3 - ym;
  }
}

function mouseup(event) {
  mdown = false;
  selected = 0;

  generateKaleidoscope();
}

function mousemove(event) {
  if (mdown == true) {
    xm = event.layerX;
    ym = event.layerY;
    if (selected == 1) {
      x1 = xm + offsetX;
      y1 = ym + offsetY;
    } else if (selected == 2) {
      x2 = xm + offsetX;
      y2 = ym + offsetY;
    } else if (selected == 3) {
      x3 = xm + offsetX;
      y3 = ym + offsetY;
    }
    paintCanvas();
  }
}

function paintCanvas() {
  ctx.drawImage(bg, 0, 0);
  drawLinks();
  drawNode(x1, y1);
  drawNode(x2, y2);
  drawNode(x3, y3);
}

function drawLinks() {
  ctx.beginPath();
  ctx.lineWidth = 3;
  ctx.strokeStyle = "#FFFF00";
  ctx.moveTo(x1, y1);
  ctx.lineTo(x2, y2);
  ctx.lineTo(x3, y3);
  ctx.lineTo(x1, y1);
  ctx.stroke();
}

function drawNode(x, y) {
  ctx.beginPath();
  ctx.arc(x,y,radius,0,2*Math.PI);
  ctx.fillStyle = "#AACCFF";
  ctx.fill();
  ctx.lineWidth = 2;
  ctx.strokeStyle = "#000000";
  ctx.stroke();
}

function generateKaleidoscope() {
  //get pixels from image
  //Todo: move to init but ensure bg is loaded before running this.
  ctxOffscreen.drawImage(bg, 0, 0);

  //generate constants...
  var slopeAC = (y3-y1) / (x3-x1)
  var slopeCB = (y2-y3) / (x2-x3)
  var slopeBA = (y2-y1) / (x2-x1)
  var offsetAC = y1 - slopeAC*x1
  var offsetCB = y3 - slopeCB*x3
  var offsetBA = y1 - slopeBA*x1
  var condAC = y2 < slopeAC * x2 + offsetAC
  var condCB = y1 < slopeCB * x1 + offsetCB
  var condBA = y3 < slopeBA * x3 + offsetBA

  var imageData = ctxOffscreen.getImageData(0,0,canvasOffscreen.width, canvasOffscreen.height);

/*
  console.log(slopeAC);
  console.log(slopeCB);
  console.log(slopeBA);
  console.log(offsetAC);
  console.log(offsetCB);
  console.log(offsetBA);
  console.log(condAC);
  console.log(condCB);
  console.log(condBA);
*/

  var source = 0
  var dest = 0;
  var d, cond, any;
  var sx, sy;
  for (var y = 0; y < 320; y += 1) {
    for (var x = 0; x < 480; x += 1) {
      dest = x * 4 + y * 4 * 480;
      sx = x;
      sy = y;
      any = true;
      maxIter = 20;

      while (any && maxIter-- > 0) {
        any = false;
        //reflect over 1->2
        d = (sx + (sy - offsetAC) * slopeAC) / (1 + slopeAC * slopeAC);
        cond = condAC ? sy > slopeAC * sx + offsetAC : sy < slopeAC * sx + offsetAC;
        sx = cond ? 2 * d - sx : sx;
        sy = cond ? 2 * d * slopeAC - sy + 2 * offsetAC : sy;
        if (cond) { any = true; }

        //reflect over 2->3
        d = (sx + (sy - offsetCB) * slopeCB) / (1 + slopeCB * slopeCB);
        cond = condCB ? sy > slopeCB * sx + offsetCB : sy < slopeCB * sx + offsetCB;
        sx = cond ? 2 * d - sx : sx;
        sy = cond ? 2 * d * slopeCB - sy + 2 * offsetCB : sy;
        if (cond) { any = true; }

        //reflect over 3->1
        d = (sx + (sy - offsetBA) * slopeBA) / (1 + slopeBA * slopeBA);
        cond = condBA ? sy > slopeBA * sx + offsetBA : sy < slopeBA * sx + offsetBA;
        sx = cond ? 2 * d - sx : sx;
        sy = cond ? 2 * d * slopeBA - sy + 2 * offsetBA : sy;
        if (cond) { any = true; }
      }


      source = Math.floor(sx) * 4 + Math.floor(sy) * 4 * 480;
      if (sx < 0 || sy < 0 || sx >= 480 || sy >= 320) {
        resultData.data[dest] = 0;
        resultData.data[dest+1] = 0;
        resultData.data[dest+2] = 0;
        resultData.data[dest+3] = 255;
      } else {
        resultData.data[dest]   = imageData.data[source];
        resultData.data[dest+1] = imageData.data[source+1];
        resultData.data[dest+2] = imageData.data[source+2];
        resultData.data[dest+3] = imageData.data[source+3];
      }

    }
  }
  //set pixels to result
  ctx2.putImageData(resultData, 0, 0);
}
