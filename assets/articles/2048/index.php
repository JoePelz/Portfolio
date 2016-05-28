<DOCTYPE html>
<html lang="en-CA">
<head>
  <title>Portfolio</title>
  <link rel="stylesheet" href="../../common.css">
  <link rel="stylesheet" href="../../article.css">
  <meta charset="utf-8">
</head>
<body>
  <header>
    <?php include '../../articleHeader.php'; ?>
  </header>

  <div id="SectionContainer">
    <h1>Making a GUI for 2048</h1>
    <p>SO much more successful than it's predecessor 2047</p>
  </div>
  <div class="content">
    <div class="center"><img src="./2048.png"></div>
    <p>As a project for my communications class, I needed to put together an instruction manual on how to accomplish a "technical task." In this case I chose a few topics in making a GUI with javax.swing, centered around the simple game 2048. Despite the focus of the tutorial being GUI building, I have included the supplementary code needed to get the game fully working.</p>
    <p>The table of contents includes:</p>
    <div class="widthLimit"><ul>
      <li>Making the Window</li>
      <li>Laying it Out</li>
      <li>Creating a Custom Component</li>
      <li>Creating a Custom JPanel</li>
      <li>Interactivity -- Action Listeners</li>
      <li>Pop-ups -- Talking to the User</li>
    </ul></div>
    <p>Download the <a href="./Making2048sGUI.pdf">instruction manual here</a></p>
    <p>Download the <a href="./GameCode.java">supplementary code here</a></p>
    <p>Download the jar file of the finished product <a href="./game2048.jar">here</a></p>
    <p>Since release, I improved the game logic to be simpler, more concise and more functional, but the manual uses the first edition so that is what I provided. A friend of mine and I built some AIs that would auto-play the game with different algorithms.  He got an AI to the point where it would get as far as 2048 sometimes, but then we both abandonded the task. Would you care to write one?</p>
    <div class="center"><img src="./tile.png"></div>
    <p>2048 was originally written by <a href="http://gabrielecirulli.github.io/2048/">Gabriele Cirulli</a> and then cloned many times over. My thoughts on this are too many and off-topic to fit in this space.</p>
  <div class="endFloat">&nbsp;</div></div>
  <footer>
    <?php include '../../footer.php'; ?>
  </footer>
</body>
</html>
