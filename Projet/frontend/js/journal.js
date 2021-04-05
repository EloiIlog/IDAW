        let urlBackendPrefix = "http://localhost/GitHub/IDAW/projet/backend/";
        let record={};
        let indicealiment=1;
        let aliments=[];
        let quantites=[];
        let timer=0;
        let types={};
        let selAliment={};

        $(document).ready(function(){
        $.getJSON(urlBackendPrefix+"recupTypes.php", function(data){
            console.log(data);
            types=data;
            $.each(data, function(i, a){
                $("#typeSelectionAliment1" ).append('<option value='+a.type+'>'+a.type+'</option>')
                });
            });
            console.log(types);
        });

        function selectTypeAliment(id){
            event.preventDefault();
            let envoi={};
            typeSel=$("#typeSelectionAliment"+id+"").val();
            console.log("voici la selection :"+typeSel);
            envoi.typeA=typeSel;
            console.log("voici la selection :"+envoi.typeA);
            $.ajax({
                url: urlBackendPrefix+"afficherAliments.php",
                method: "POST",
                dataType : "json",
                data : envoi,
            }).always(function(response){
                console.log(response);
                data=response;
                selAliment=response;
                $.each(data, function(i, a){
                    $("#inputAliment"+id+"" ).append('<option value='+a.nom+'>'+a.nom+'</option>')
                    });
                });
        }

        function ajoutChamps(){
            event.preventDefault();
            indicealiment++;
            $("<div class='form-recherche'><label for='searchTypeAliment' class='col'>Type d'aliment n°"
            +indicealiment+"</label><select id='typeSelectionAliment"
            +indicealiment+"' name='typeSelectionAliment"
            +indicealiment+"'><option value='tout'>Tout afficher</option><select></div></div><div class='form-group row'><span class='col-sm-2'></span><div class='col-sm-2' ><button onclick='selectTypeAliment("
            +indicealiment+");' class='btn btn-primary form-control'>Valider votre selection de type</button></div></div><div class='form-group row'><label for='searchAliment' class='col'>Aliment consommé n°"
            +indicealiment+"</label><select id='inputAliment"
            +indicealiment+"' name='inputAliment1"
            +indicealiment+"'><select><div class='col-sm-3'></div></div><div class='form-group row'><label for='inputQuantite"
            +indicealiment+"' class='col-sm-2 col-form-label'>Quantite n°"
            +indicealiment+"</label><div class='col-sm-3'><input type='text' class='form-control' id='inputQuantite"
            +indicealiment+"' ></div>").appendTo("#quantite");
            $.each(types, function(i, a){
                $("#typeSelectionAliment"+indicealiment+"").append('<option value='+a.type+'>'+a.type+'</option>');
            });
            $.each(selAliment, function(i, a){
                    $("#inputAliment"+indicealiment+"" ).append('<option value='+a.nom+'>'+a.nom+'</option>')
                    });

        }

        function ajoutJournal(){
            event.preventDefault();
            $("#enCours").append(`Votre repas à bien été enregistré dans l'historique <br>
            Pour voir vos statistique aller dans l'onglet <a href='pages/historique.php'>historique</a>`)
            record.date=$('#inputDate').val();
            record.time=$('#inputHeure').val();
            record.type=$('#inputTypeRepas').val();
            record.comment=$('#inputCommentaires').val();
            for (let i = 1; i <= indicealiment; i++) {
                let a=$('#inputAliment'+i+'').val();
                console.log(a);
                aliments[i-1]=a;
                console.log(aliments);
                let b=$('#inputQuantite'+i+'').val()
                quantites[i-1]=b;
            }
            record.aliments=aliments;
            record.quantites=quantites;
            record.nbaliment=indicealiment;
            ajouteHistorique(record);
        }

        function ajouteHistorique(newRecord){
            console.log(newRecord);
            $.ajax({
                url: urlBackendPrefix+"addHistorique.php",
                method: "POST",
                dataType : "json",
                data : newRecord,    
            }).always(function(response){
                console.log(response);
                ajouteComporepas(newRecord);
                });
        }

        function ajouteComporepas(newRecord){
            console.log(newRecord);
            $.ajax({
                url: urlBackendPrefix+"addComporepas.php",
                method: "POST",
                dataType : "json",
                data : newRecord,    
            }).always(function(response){
                console.log(response);
                });
        }

