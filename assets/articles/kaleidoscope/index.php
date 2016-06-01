  <div id="SectionContainer">
    <h1>Kaleidoscope</h1>
    <p>Mirrors, mirrors, on the walls. Where am I in these mirrored halls?</p>
  </div>
  <div class="content">
    <p>p1</p>
    <div class="centered"><img id="backgroundImage" src="/assets/articles/kaleidoscope/tester.bmp"></img></div>
    <p>p2</p>
    <div class="interactive widthlimit centered"><canvas id="canvasOriginal" width="480" height="320"></canvas></div>
    <p>p3</p3>
    <p>p4</p3>
    <div class="interactive widthlimit centered"><canvas id="canvasResult"  width="480" height="320"></canvas></div>
    <p>p5</p>
    <p>p6</p>
  </div>
  <div class="endFloat">&nbsp;</div></div>
  <script>
  var body = document.getElementsByTagName("body")[0];
  body.addEventListener("load", init(), false);
  </script>
