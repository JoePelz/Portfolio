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
    <h1>Binary Tree Builder</h1>
    <p>To tree or not to tree</p>
  </div>
  <div class="content">
    <div class="center"><img src="./tree.png"></div>
    <p>At one point in my second semester, three of my classes almost simultaneously began talking about binary trees.  I had to draw and traverse a few of them by hand which was a very clear, simple, timeconsuming process so I tinkered with writing a program to do it for me.</p>
    <p>I already had a lot of the groundwork from having built a circuit display, I just created a new "gate" type to display the numbers and had the computer handle the connecting and positioning aspects.</p>
    <p>There are two things the program can do. When you type in the top left input box, your numbers are inserted into the tree. When you press the rebalance button at the bottom, the tree is rearranged to be balanced, and help maintain that O(log n) search efficiency.</p>
    <p>Download the jar file <a href="./binaryTree.jar">here</a></p>
  <div class="endFloat">&nbsp;</div></div>
  <footer>
      <?php include '../../footer.php'; ?>
  </footer>
</body>
</html>
