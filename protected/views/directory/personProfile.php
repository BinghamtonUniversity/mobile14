<style>
    .phone { font-weight: bold;}
    .profile label {color: darkgreen; width: 5rem;
display: inline-block;}
</style>

<script>   

$('.add-contact-btn').click(function(){
    alert('clicked');
    addToContacts(window.personProfile);
    return false;
});

var personProfile = <?php echo json_encode($obj['rows'][0]) ?>;
console.log(personProfile);


function addToContacts(personProfile) {
    event.preventDefault();
    console.log('addToContacts');
    console.log(personProfile);
    if (!navigator.contacts) {
            //app.showAlert("Contacts API not supported", "Error");
            alert(personProfile.FirstName + " NOT added!");
    }
    
    var contact = navigator.contacts.create();
    contact.name = {
        givenName: personProfile.FirstName, 
        familyName: personProfile.LastName,
        formatted: personProfile.FirstName + " " + personProfile.LastName
    };
    contact.displayName = personProfile.FirstName + " " + personProfile.LastName;
    var phoneNumbers = [];
    phoneNumbers[0] = new ContactField('work', personProfile.DirectoryNumber, true);
    contact.phoneNumbers = phoneNumbers;
    contact.save();
    alert(personProfile.LastName + " added!");
    return false;
};

</script>

<?php


foreach($obj['rows'] as $item) {
    echo "<div class='profile'>";
    echo "<h2>".$item['FirstName']." ".$item['LastName']."</h2>";
    echo "<h3>".$item['Title']."</h3>";
    echo "<div class='building'><label>Dept</label><a href='dept?ID=".$item['DeptLinkID']."'>".$item['DeptName']."</a></div>";
    echo "<div class='building'><label>Location</label><a href='map?ID=".$item['BuildingID']."'>".$item['Location']."</a></div>";
    echo "<div class='phone'><label>Phone</label><a href='tel:".$item['DirectoryNumber']."'>".$item['DirectoryNumber']."</a></div>";
    echo "<div class='email'><label>Email</label><a href='mailto:".$item['Email']."'>".$item['Email']."</a></div>";
    echo "<button class='btn add-contact-btn'>Add to Contacts</div>";
    echo "</div>";
}
/*
	        <h2>{{title}}</h2>
	        <span class="location"></span>
	        <ul>
	            <li><a href="tel:{{officePhone}}">Call Office<br/>{{officePhone}}</a></li>
	            <li><a href="tel:{{cellPhone}}">Call Cell<br/>{{cellPhone}}</a></li>
	            <li><a href="sms:{{cellPhone}}">SMS<br/>{{cellPhone}}</a></li>
	            <li><a href="#" class="add-location-btn">Add Location</a></li>
	            <li><a href="#" class="add-contact-btn">Add to Contacts</a></li>
	        </ul>
                            

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