<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <title>tabletest</title>
        <style>
        body{ margin-top: 5em; }
        .table {
        margin-top: 100px;
        margin-bottom: 100px;
        }
        </style>
    </head>


<body>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom Aliment</th>
            <th scope="col">Type d'aliment</th>
        </tr>
    </thead>
    <tbody id="alimentsTableBody">
    </tbody>
</table>
    <form id="addAlimentsForm" action="" onsubmit="onFormSubmit();">
        <div class="form-group row">
            <label for="inputNom" class="col-sm-2 col-form-label">Nom Aliment</label>
            <p id=erreur></p>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAliments" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPrenom" class="col-sm-2 col-form-label">Type d'aliment</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputType" >
            </div>
        </div>
        <div class="form-group row">
            <span class="col-sm-2"></span>
        <div class="col-sm-2" >
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </div>
</div>
</form>


<script>

let students = [
    {
        id: 1,
        nom: "Guisnet",
        prenom: "Eloi",
        check: true,
        date: "03/10/1999",
        remarques: "okok"
    }
];

for (k in students){
    $("#studentsTableBody").append('<tr id='+k.id+'><td>'+k.nom+'</td><td>'
        +k.prenom+'<td><td>'
        +k.date+'<td><td>'+k.check+
    '<td><td>'+k.remarques+
    '</td><td><button onclick=edit('+k.id+')>edit</button><button onclick=remove('+k.id+')>remove</button></td></tr>') ;
};
let idligne=0;
let currentligne=-1;

function onFormSubmit() {
// prevent the form to be sent to the server
event.preventDefault();
let nom = $("#inputNom").val();
let prenom = $("#inputPrenom").val();
let date = $("#inputDate").val();
let remarques = $("#inputRemarques").val();
let check=$("#inputCheck").prop("checked");
//$("check").val();

if (nom!=''){
    if (currentligne==-1){
        
        students.push(idligne,nom,prenom,check,date,remarques);
        $("#erreur").empty();

    $("#studentsTableBody").append('<tr id='+idligne+'><td>'+students[idligne].nom+'</td><td>'
        +students[idligne].prenom+'<td><td>'
        +students[idligne].date+'<td><td>'+students[idligne].check+
    '<td><td>'+students[idligne].remarques+
    '</td><td><button onclick=edit('+idligne+')>edit</button><button onclick=remove('+idligne+')>remove</button></td></tr>') ;
    console.log(students[idligne]);
    idligne+=1;
    }

    
    else{
        students[currentligne]=[idligne,nom,prenom,check,date,remarques];
        console.log(students[currentligne]);
    $('#'+currentligne).empty();
    $("#erreur").empty();
    $('<tr id='+idligne+'><td>'+nom+'</td><td>'+prenom+'<td><td>'+date+'<td><td>'+check+
    '<td><td>'+remarques+
    '</td><td><button onclick=edit('+idligne+')>edit</button><button onclick=remove('
    +idligne+')>remove</button></td></tr>').appendTo('#'+currentligne) ;
    boedit=false;
    }
}
}

function edit(a){
    $("#erreur").append('Vous êtes entrain de modifier la ligne '+a);
    currentligne=a;
}
function remove(b){
    $('#'+b).empty();
}
</script>
</body>
</html>