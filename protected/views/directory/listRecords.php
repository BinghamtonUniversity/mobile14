<?php

if ($obj['total_rows']) {

echo "<h2>Results for <span class='q'>&quot;$q&quot;</span></h2>";
echo "<ul>";

foreach($obj['rows'] as $item) {
    echo "<li>"
        .substr($item['DirectoryType'],0,1)
        ." <a href=\"http://".$_SERVER['SERVER_NAME'].Yii::app()->request->baseUrl."/index.php/directory/personProfile?id=".$item['LinkID']."\">"
        .$item['FirstName']." ".$item['LastName']
        ."</a></li>";
}

echo "</ul>";
    
} else {
    echo "Sorry, no results were found.";
}
/*
            [LinkID] => 4090DC47421E1C2B4663AE2DE4813C6C
            [DirectoryType] => Faculty/Staff
            [FirstName] => Paul
            [LastName] => Gould
            [Title] => Visiting Assistant Professor
            [Email] => pgould@binghamton.edu
            [DirectoryNumber] => 607-777-9160
            [Location] => DC 203
            [BuildingID] => DC
            [DeptLinkID] => 1466CBB00A07F568DB44402E8BD7AE16
            [DeptName] => CCPA Social Work
*/