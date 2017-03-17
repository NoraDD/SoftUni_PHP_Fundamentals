<?php session_start();
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
?>
    <form>
        <div>
            <label for="">Enter HTML tags:</label>
        </div>
        <br>
        <div>
            <input type="text" name="tag">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

<?php
$htmlTags = ["!DOCTYPE", "a", "abbr", "acronym", "address", "applet", "area", "article", "aside", "audio", "b", "base", "basefont", "bdi", "bdo", "big", "blockquote", "body", "br", "button", "canvas", "caption", "center", "cite", "code", "col", "colgroup", "datalist", "dd", "del", "details", "dfn", "dialog", "dir", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption", "figure", "font", "footer", "form", "frame", "frameset", "h1 to h6", "head", "header", "hr", "html", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label", "legend", "li", "link", "main", "map", "mark", "menu", "menuitem", "meta", "meter", "nav", "noframes", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "picture", "pre", "progress", "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select", "small", "source", "span", "strike", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th", "thead", "time", "title", "tr", "track", "tt", "u", "ul", "var", "video", "wbr"];

if (isset($_GET["submit"]) && isset($_GET["tag"])) {
    $tag = trim($_GET["tag"]);

    if (in_array($tag, $htmlTags)) {
        echo "<h1>Valid HTML tag!</h1>";
        $_SESSION['score']++;
    } else {
        echo "<h1>Invalid HTML tag!</h1>";
    }

    echo "<h2>" . $_SESSION['score'] . "</h2>";
}
