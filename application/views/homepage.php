  <div id="SectionContainer">
    <!-- <h1>cat ~/projects/*</h1> <!-- Excessively clever. -->
    <h1>Fresh Baked Projects</h1>
    <p>Now gluten free!</p>

    {sections}<section id="{sectionTitle}">
        <h3>{sectionTitle}</h3>
        {articles}<article>
          <a href="{articlePath}">
          <img src="{articleImage}">
          <h4>{articleTitle}</h4></a></article>{/articles}{/sections}
    <div class="endFloat">&nbsp;</div></div>
