<html>

<head>
<title>Drug Interactions</title>
<link rel="stylesheet" href="Drug_Interactions.css">
</head>

<body>
<div id="Title">
    <h1>DRUG PRESCRIPTION PORTAL</h1>
</div>

<div id="form">
    <form action="submit_drugs.php" method=post>
        Drug 1:
        <input type="text" name=" ?>"><br/><br/>
        Drug 2:
        <input type="text" name="drug2"><br/><br/>

        <input type="submit" value="Prescribe">
    </form>
</div>

<?php
//get the drug names from the php files
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$drug1 = test_input($_POST["drug1"]);
	$drug2 = test_input($_POST["drug2"]);
}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$rxcui ="https://rxnav.nlm.nih.gov/REST/rxcui?name=";
$drug1_file = file_get_contents($rxcui.$drug1);
$drug2_file  = file_get_contents($rxcui.$drug2);

$xml1_file = simplexml_load_string($drug1_file) or die("Error: Drug 1 couldn't be found");
$xml2_file = simplexml_load_string($drug2_file) or die("Error: Drug 2 couldn't be found");

$rxnormId1 =  $xml1_file->idGroup[0]->rxnormId;
$rxnormId2 =  $xml2_file->idGroup[0]->rxnormId;

if(empty($rxnormId1) || empty($rxnormId2)){
    echo "Go back and enter correct drug name";
    exit;
}
else{
$source = "&sources=DrugBank";
$interaction_string = "https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=";

//now we have rxnormID of both the drugs
// using these rxnormIDs we now extract the interaction pages of each of the drugs
$link1 = $interaction_string . $rxnormId1 . $source;
$link2 = $interaction_string . $rxnormId2 . $source;
$str1 = file_get_contents($link1);
$str2 = file_get_contents($link2);
$json1 = json_decode($str1, true);
$json2 = json_decode($str2, true);
$description1 = $json1['interactionTypeGroup'][0]['interactionType'][0]['interactionPair'];
$description2 = $json2['interactionTypeGroup'][0]['interactionType'][0]['interactionPair'];
?>
<br>
<br>
<table id="Drug_display">
    <tr>
        <th>Drug</th>
        <th>RXNORM ID</th>
    </tr>
    <tr>
        <td><?php echo $drug1; ?></td>
        <td><?php echo $rxnormId1; ?></td>

    </tr>
    <tr>
        <td><?php echo $drug2; ?></td>
        <td><?php echo $rxnormId2 ?></td>
    </tr>

</table>
<br>
<br>
<p id="Interaction">Interaction between the two drugs (if any)</p>
<div id="display_message">
    <?php
    // using the description data stored, we make a function that checks for a description of drug 1 in drug 2
    $count_matches = 0;
    $ext_description1 = "ext_desc1";
    $ext_description2 = "ext_desc2";
    foreach ($description1 as $value1) {
        $drug_first = $value1['interactionConcept'][1]['minConceptItem']['rxcui'];
        if ($drug_first == $rxnormId2) {
            $ext_description1 = $value1['description'];
            $count_matches = $count_matches + 1;
        }
    }

    foreach ($description2 as $value2) {
        $drug_second = $value2['interactionConcept'][1]['minConceptItem']['rxcui'];
        if ($drug_second == $rxnormId1) {
            $ext_description2 = $value2['description'];
            $count_matches = $count_matches + 1;

        }
    }
    if ($count_matches == 0) {
        echo "No interactions between the drugs";
    } elseif ($ext_description1 == $ext_description2) {
        echo $ext_description1;
    } elseif ($ext_description1 == "ext_desc1") {
        echo $ext_description2;
    } elseif ($ext_description2 == "ext_desc2") {
        echo $ext_description1;
    } else {
        echo $ext_description1;
        echo "\n";
        echo $ext_description2;
    }
    }
    //function to print files
    ?>
</div>




</body>
</html>