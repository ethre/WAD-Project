<?php

/*
 * PHP SimpleXML
 * Loading a XML from a file, adding new elements and editing elements
 */

$author = $_POST["author"];

if (file_exists('catalog.xml')) {
    //loads the xml and returns a simplexml object
    $xml = simplexml_load_file('catalog.xml');

    //transforming the object in xml format
    $xmlFormat = $xml->asXML();
    //displaying the element in proper format
    echo '<u><b>This is the xml code from test2.xml:</b></u>
     <br /><br />
     <pre>' . htmlentities($xmlFormat, ENT_COMPAT | ENT_HTML401, "ISO-8859-1") . '</pre><br /><br />';

    //adding new child to the xml
    $newChild = $xml->addChild('PRODUCT');
    $newChild->addChild('TITLE', $author);
    $newChild->addChild('DESC', 'XML Rocks');
    $newChild->addChild('COUNTRY', 'Computing');
    $newChild->addChild('PRICE', '100 $');
  
    //transforming the object in xml format
    $xmlFormat = $xml->asXML();
    //displaying the element in proper format
    echo '<u><b>This is the xml code from test2.xml with new elements added:</b></u>
     <br /><br />
     <pre>' . htmlentities($xmlFormat, ENT_COMPAT | ENT_HTML401, "ISO-8859-1") . '</pre>';

    //changing the nodes values
    //in this case we are changing the value 
    //of all children called <name>
    foreach ($xml->children() as $child)
        $child->genre = "CHANGED";
    //displaying the element in proper format
    echo '<br /><u><b>This is the xml code from catalog.xml with all genre changed:</b></u>
     <br /><br />
     <pre>' . htmlentities($xml->asXML(), ENT_COMPAT | ENT_HTML401, "ISO-8859-1") . '</pre>';
} else {
    exit('Failed to open catalog.xml.');
}
    file_put_contents('/home/ubuntu/workspace/catalog.xml', $xml->asXML());
    
    writeRSS();
    function writeRSS(){
        if (file_exists('rss.xml')) {
            //loads the xml and returns a simplexml object
            $rssxml = simplexml_load_file('rss.xml');
            $newChild = $rssxml->channel->addChild('item');
            $newChild->addChild('title', $author);
            $newChild->addChild('link', 'XML Rocks');
            $newChild->addChild('guid', 'Computing');
            $newChild->addChild('description', '100 $');
            file_put_contents('/home/ubuntu/workspace/rss.xml', $rssxml->asXML());
        }
    }
?>