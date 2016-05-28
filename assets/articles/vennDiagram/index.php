<DOCTYPE html>
<html lang="en-CA">
<head>
  <title>Portfolio</title>
  <link rel="stylesheet" href="../../common.css">
  <link rel="stylesheet" href="../../article.css">
  <link rel="stylesheet" href="./table.css">
  <meta charset="utf-8">
  <script src="elm.js" charset="utf-8"></script>
</head>
<body>
  <header>
      <?php include '../../articleHeader.php'; ?>
  </header>

  <div id="SectionContainer">
    <h1>Venn Diagram Generator</h1>
    <p>A = Math, B = Programming, C = Creativity</p>
  </div>
  <div class="content">
    <p>Boolean logic and set theory were subjects I studied on both my math courses.  One of the visual representations we explored when first introducing the subject was the Venn diagram.</p>
    <p>We used a few different notations for the boolean operations but for the sake of typing ease, this particular program sticks with typeable keys listed below. The following operations are permitted:</p>
    <table class="widthLimit">
      <tr><td>+</td><td>A + B</td><td>Union</td></tr>
      <tr><td>*</td><td>A * B</td><td>Intersection</td></tr>
      <tr><td>-</td><td>A - B</td><td>Difference</td></tr>
      <tr><td>^</td><td>A ^ B</td><td>Symmetric Difference</td></tr>
      <tr><td>'</td><td>A'</td><td>Inverse</td></tr>
      <tr><td>()</td><td>A + (A-B)</td><td>Order of Operations</td></tr>
    </table>
    <p></p>
    <div class="interactive widthlimit centered"><div id='vennDiagrams' class="centered"></div></div>
  <div class="endFloat">&nbsp;</div></div>
  <footer>
      <?php include '../../footer.php'; ?>
  </footer>
</body>
<script>
var div = document.getElementById('vennDiagrams');
Elm.embed(Elm.Boolean2D, div);
</script>
</html>
