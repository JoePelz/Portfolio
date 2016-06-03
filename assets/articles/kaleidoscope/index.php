  <div id="SectionContainer">
    <h1>Kaleidoscope</h1>
    <p>Mirrors, mirrors, on the walls. Where am I in these mirrored halls?</p>
  </div>
  <div class="content">
    <p>Move the corners of the triangle to make your own kaleidoscope! </p>
    <div class="interactive widthlimit centered">
      <p><input type="text" width="300" id="URLLoader" name="URLLoader" placeholder="Paste an image url here"></input><input type="button" value="Load Image" onclick="handleURL();"></input></p>
      <p>Or upload one: <input type="file" accept="image/*" id="imageLoader" name="imageLoader" placeholder="Or Upload one"/></p>
      <canvas id="canvasOverlay" width="512" height="320"></canvas>
      <canvas id="canvasResult"  width="512" height="512"></canvas></div>
    <p>p3</p3>
    <p>p4</p>
    <p>p5</p>
  </div>
  <div class="endFloat">&nbsp;</div></div>
  <script>
  var body = document.getElementsByTagName("body")[0];
  body.addEventListener("load", init(), false);
  </script>
