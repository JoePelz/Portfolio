//globals?
var canvas;
var ctx;
var canvas2;
var ctx2;

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
  canvas = document.getElementById("canvasOriginal");
  ctx = canvas.getContext("2d");
  canvas2 = document.getElementById("canvasResult");
  ctx2 = canvas2.getContext("2d");
  bg = document.getElementById("backgroundImage");

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
