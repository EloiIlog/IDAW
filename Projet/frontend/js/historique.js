
let urlBackendPrefix = "http://localhost/GitHub/IDAW/projet/backend/";
        let types={};
        let historiqueAl={};
        let historiqueRep=[];
        let groupRepas=[];
        let dureeSel='';

//Ajoute le selecteur de type
$(document).ready(function(){
        $.getJSON(urlBackendPrefix+"recupTypes.php", function(data){
            console.log(data);
            types=data;
            $.each(data, function(i, a){
            $("#typeSelection" ).append('<option value='+a.type+'>'+a.type+'</option>')
        });
                    });
                    console.log(types);
            });

function chargeHistorique(){
    event.preventDefault();
    $('#historiqueTableBody').empty();
    let selection={};
    let typeSel=$('#typeSelection').val();
    dureeSel=$('#dureeSelection').val();
    selection.type=typeSel;
    selection.duree=dureeSel;
    console.log(selection);
    $('#stat').empty();
    $("#boutonStat").empty();

    $('#boutonStat').append('<button onclick=statSelection()>Stat sur la période selectionné</button>')
    $.ajax({
        url: urlBackendPrefix+"afficherHistorique.php",
        method: "POST",
        dataType : "json",
        data : selection,    
        }).always(function(response){
        console.log(response);
        
        $.each(response, function(i, a){
            
            a.id=i;
            afficheUneLigne(a);
            });
            historiqueAl=response;
            historiqueAlToRep(historiqueAl);
        });
    
}

        
function historiqueAlToRep(historique){
    h=historique;
    console.log(h);
    let ligne=[];
            let aliments=[];
                    let quantites=[];
                    ligne.date=h[0].date;
                    ligne.heure=h[0].heure;
                    aliments.push(h[0].nom);
                    ligne.aliments=aliments;
                    quantites.push(h[0].quantite);
                    ligne.quantites=quantites;
                    let q=parseFloat(h[0].quantite);
                    ligne.typeRep=h[0].typeRepas;
                    ligne.energieR=q*(parseFloat(h[0].energie)/100);
                    ligne.proteinesR = q*(parseFloat(h[0].proteines)/100);
                    ligne.glucidesR = q*(parseFloat(h[0].glucides)/100);
                    ligne.lipidesR = q*(parseFloat(h[0].lipides)/100);
                    ligne.sucresR = q*(parseFloat(h[0].sucres)/100);
                    ligne.agR = q*(parseFloat(h[0].AG)/100);
                    ligne.selR = q*(parseFloat(h[0].sel)/100);
                    ligne.potassiumR = q*(parseFloat(h[0].potassium)/100);
                    historiqueRep.push(ligne);
        console.log(ligne);
        for (let a in h){
            
            console.log("first");
            for (let b in historiqueRep){
                //let cree=false;
                if ((h[a].date==historiqueRep[b].date)&&(h[a].heure==historiqueRep[b].heure)){
                    let ligne=historiqueRep[b];
                    let aliments=[];
                    let quantites=[];
                    (ligne.aliments).push(h[a].nom);
                    (ligne.quantites).push(h[a].quantite);
                    let q=parseFloat(h[a].quantite);
                    ligne.typeRep=h[a].typeRepas;
                    ligne.energieR+=q*(parseFloat(h[a].energie)/100);
                    ligne.proteinesR += q*(parseFloat(h[a].proteines)/100);
                    ligne.glucidesR += q*(parseFloat(h[a].glucides)/100);
                    ligne.lipidesR += q*(parseFloat(h[a].lipides)/100);
                    ligne.sucresR += q*(parseFloat(h[a].sucres)/100);
                    ligne.agR += q*(parseFloat(h[a].AG)/100);
                    ligne.selR += q*(parseFloat(h[a].sel)/100);
                    ligne.potassiumR += q*(parseFloat(h[a].potassium)/100);
                    console.log("a");
                    //cree=true;
                }
                else{
                let ligne=[];
                    let aliments=[];
                    let quantites=[];
                    ligne.date=h[a].date;
                    ligne.heure=h[a].heure;
                    aliments.push(h[a].nom);
                    ligne.aliments=aliments;
                    quantites.push(h[a].quantite);
                    ligne.quantites=quantites;
                    let q=parseFloat(h[a].quantite);
                    ligne.typeRep=h[a].typeRepas;
                    ligne.energieR=q*(parseFloat(h[a].energie)/100);
                    ligne.proteinesR = q*(parseFloat(h[a].proteines)/100);
                    ligne.glucidesR = q*(parseFloat(h[a].glucides)/100);
                    ligne.lipidesR = q*(parseFloat(h[a].lipides)/100);
                    ligne.sucresR = q*(parseFloat(h[a].sucres)/100);
                    ligne.agR = q*(parseFloat(h[a].AG)/100);
                    ligne.selR = q*(parseFloat(h[a].sel)/100);
                    ligne.potassiumR = q*(parseFloat(h[a].potassium)/100);
                    historiqueRep.push(ligne);
                }
            } 
        }
        console.log(h);
        console.log(historiqueRep);
    
}

function afficheUneLigne(record){
    $("#historiqueTableBody").append('<tr> <td> '
        +record.date+'  </td> <td> '
        +record.heure+'  </td><td> '
        +record.typeRepas+'  </td><td> '
        +record.commentaires+'  </td><td> '
        +record.nom+'  </td><td><button onclick=edit('
        +record.id+')>edit</button></td><td><button onclick=statRepas('
        +record.id+')>stat Repas</button></td><td><button onclick=statAliment('
        +record.id+')>Stat Aliment</button></td></tr>');
}

function statRepas(i){
    $("#stat").empty();
    console.log(i);
    let d=historiqueAl[i].date;
    let h=historiqueAl[i].heure;
    let j=0;
    while ((historiqueRep[j].date!=d)||(historiqueRep[j].heure!=h)){
        j++;
    }
    let total=historiqueRep[j].proteinesR+historiqueRep[j].glucidesR+historiqueRep[j].lipidesR;
    let partLip=parseInt((historiqueRep[j].lipidesR/total)*100);
    let partProt=parseInt((historiqueRep[j].proteinesR/total)*100);
    let partGlu=parseInt((historiqueRep[j].glucidesR/total)*100);
    $("#stat").append("<h3>Statistique du repas: "
    +historiqueRep[j].typeRep+" le "
    +historiqueRep[j].date+"</h3><br><p id='aliments'>liste des aliments:</p><p>Nombre de kcal: "
    +historiqueRep[j].energieR+"</p><br><p>La composition de votre repas est "
    +partLip+"% de lipides, "
    +partProt+"% de proteines, "
    +partGlu+"% de glucides.</p><br><div id='bar'></div><br><p>Proteines: "
    +historiqueRep[j].proteinesR+"g</p><br><p>Lipides: "
    +historiqueRep[j].lipidesR+"g</p><br><p>Glucides: "
    +historiqueRep[j].glucidesR+"g</p><br><p>Lipides: "
    +historiqueRep[j].lipidesR+"g</p><br><p>Acides Gras saturés: "
    +historiqueRep[j].agR+"g</p><br><p>Sel: "
    +historiqueRep[j].selR+"g</p><br><p>Potassium: "
    +historiqueRep[j].potassiumR+"mg</p><br><p>Sucres: "
    +historiqueRep[j].sucresR+"g</p>");
    console.log(historiqueRep[j].aliments[0]);
    $.each(historiqueRep[j].aliments, function(k, a){
        $("#aliments").append(" - "+historiqueRep[j].aliments[k]+"<br>");
        });
        $("#bar").append(`<div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: `+(1+partLip)+`%" aria-valuenow="`+(1+partLip)+`" aria-valuemin="0" aria-valuemax="100">Lipides</div>
        <div class="progress-bar bg-success" role="progressbar" style="width: `+partProt+`%" aria-valuenow="`+partProt+`" aria-valuemin="0" aria-valuemax="100">Proteines</div>
        <div class="progress-bar" role="progressbar" style="width: `+partGlu+`%" aria-valuenow="`+partGlu+`" aria-valuemin="0" aria-valuemax="100">Glucides</div>
      </div>`);

}
function statAliment(i){
    $("#stat").empty();
    console.log(i);
    $("#stat").append('<h3>Statistique Aliment: '
    +historiqueAl[i].nom+'</h3><br><p>Nombre de kcal: '
    +historiqueAl[i].energie+'</p><br><p>Proteines: '
    +historiqueAl[i].proteines+'g</p><br><p>Nombre de kcal: '
    +historiqueAl[i].lipides+'g</p><br><p>Nombre de kcal :'
    +historiqueAl[i].glucides+'g</p><br><p>Nombre de kcal: '
    +historiqueAl[i].lipides+'g</p><br><p>Nombre de kcal: '
    +historiqueAl[i].AG+'g</p><br><p>Nombre de kcal: '
    +historiqueAl[i].sel+'g</p><br><p>Nombre de kcal: '
    +historiqueAl[i].potassium+'g</p><br><p>Nombre de kcal: '
    +historiqueAl[i].energie+'g</p>');
}

function statSelection(periode){
    $("#stat").empty();

    console.log("periode");
    let energieT=0;
    let proteinesT=0;
    let glucidesT=0;
    let lipidesT=0;
    let sucresT=0;
    let agT=0;
    let selT=0;
    let potassiumT=0;
    $.each(historiqueAl, function(i, a){
        let q=parseFloat(historiqueAl[i].quantite);
        energieT+=q*(parseFloat(historiqueAl[i].energie)/100);
        proteinesT += q*(parseFloat(historiqueAl[i].proteines)/100);
        glucidesT += q*(parseFloat(historiqueAl[i].glucides)/100);
        lipidesT += q*(parseFloat(historiqueAl[i].lipides)/100);
        sucresT += q*(parseFloat(historiqueAl[i].sucres)/100);
        agT += q*(parseFloat(historiqueAl[i].AG)/100);
        selT += q*(parseFloat(historiqueAl[i].sel)/100);
        potassiumT += q*(parseFloat(historiqueAl[i].potassium)/100);
    });
    let total=lipidesT+proteinesT+glucidesT;
    let partLipT=parseInt((lipidesT/total)*100);
    let partProtT=parseInt((proteinesT/total)*100);
    let partGluT=parseInt((glucidesT/total)*100);
    $("#stat").empty();
    $("#stat").append("<h3>Statistique sur la période "
    +dureeSel+" et le type d'aliment selectionnés :</h3><br><p>Nombre total de kcal: "
    +energieT+"</p><br><p>La composition de votre alimentation sur la période selectionnée est "
    +partLipT+"% de lipides, "
    +partProtT+"% de proteines, "
    +partGluT+"% de glucides.</p><br><div id='bar'></div><p>Proteines: "
    +proteinesT+"g</p><br><p>Lipides: "
    +lipidesT+"g</p><br><p>Glucides: "
    +glucidesT+"g</p><br><p>Lipides: "
    +lipidesT+"g</p><br><p>Acides Gras saturés: "
    +agT+"g</p><br><p>Sel: "
    +selT+"g</p><br><p>Potassium: "
    +potassiumT+"mg</p><br><p>Sucres: "
    +sucresT+"g</p>");
    $("#bar").append(`<div class="progress">
    <div class="progress-bar bg-info" role="progressbar" style="width: `+(1+partLipT)+`%" aria-valuenow="`+(1+partLipT)+`" aria-valuemin="0" aria-valuemax="100">Lipides</div>
    <div class="progress-bar bg-success" role="progressbar" style="width: `+partProtT+`%" aria-valuenow="`+partProtT+`" aria-valuemin="0" aria-valuemax="100">Proteines</div>
    <div class="progress-bar" role="progressbar" style="width: `+partGluT+`%" aria-valuenow="`+partGluT+`" aria-valuemin="0" aria-valuemax="100">Glucides</div>
  </div>`);
}