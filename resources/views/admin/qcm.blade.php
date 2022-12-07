@extends('layout.master')

@section('content')
    @include('include.navadmin')


    <form class="" action="" method="post">
        @csrf

        <h1 class="text-center">Créer un QCM</h1>

        <select name="id_formation[]">
            <option value="">--Choisi une formation--</option>
            @foreach ($formations as $formation)
                <option value="{{ $formation->id_formation }}">{{ $formation->nom }}</option>
            @endforeach
        </select>

        <select name="id_matiere">
            {{-- <option value="">--Choisi une Matiere--</option> --}}
        </select>

        <select name="id_chapitre[]">

        </select>
        <hr>
        <div class="col-md-4">
            <label class="labels">Nom Du QCM</label>
            <input class="form-control" type="text" name="titre" required="">
        </div>
        <hr>

        <div class="col-md-8 questionOption">

            <label class="labels">Question?</label>
            <input class="form-control" type="text" name="question[]" required="">

            <label class="labels">Point de la question</label>
            <input class="form-control" type="text" name="points[]" required="">

            <select name="type[]" id="selecttype">
                <option value="">--Choisi un type--</option>
                <option value="truefalse">Vrai Ou Faux</option>
                <option value="multiple">Choix Multiple</option>
            </select>
            <div class="truefalse">

            </div>
            <div class="multiple">

            </div>
            <hr>


        </div>

        <div>
            <input class="btn btn-warning" type="button" name="addQuestion" id="addQuestion" value="Ajouter Question">
        </div>
        <div class="row">
            <div class="col-12 ps-0">
                <button id="btncreate" type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>


    </form>





    <script>
        jQuery(document).ready(function() {
            jQuery('select[name="id_formation[]"]').on('change', function() {
                var formationID = jQuery(this).val();
                console.log(formationID);
                if (formationID) {
                    jQuery.ajax({
                        url: '/backoffice/qcm/getMatieres/' + formationID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            jQuery('select[name="id_matiere"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="id_matiere"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });

                } else {
                    $('select[name="id_matiere"]').empty();
                }
            });

            jQuery('select[name="id_matiere"]').on('change', function() {
                var matiereID = jQuery(this).val();
                console.log(matiereID);
                if (matiereID) {
                    jQuery.ajax({
                        url: '/backoffice/qcm/getChapitre/' + matiereID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            jQuery('select[name="id_chapitre[]"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="id_chapitre[]"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });

                } else {
                    $('select[name="id_chapitre[]"]').empty();
                }
            });


            let question =
                `<label class="labels">Question?</label> <input class="form-control" type="text" name="question[]" required=""> <label class="labels">Point de la question</label> <input class="form-control" type="text" name="points[]" required=""> <select name="type[]" id="selecttype" class="selecttype"> <option value="">--Choisi un type--</option> <option value="truefalse">Vrai Ou Faux</option> <option value="multiple">Choix Multiple</option> </select> <div class="truefalse"> </div><div class="multiple"> </div><hr>`;

            $("#addQuestion").click(function() {
                $(".questionOption").append(question);



            });


            el = document.getElementById('selecttype');
            let truefalse = '<input type="text" class="form-control" name="option[]" value="Vrai" disabled="disabled">\
                     <input  class="form-check-input" type="hidden" name="correct[]" value="0" id="flexCheckDefault">\
                     <input class="form-check-input" type="checkbox" name="correct[]" value="1" id="flexCheckDefault">\
                     <input type="text" class="form-control" name="option[]" value="Faux" disabled="disabled">\
                     <input  class="form-check-input" type="hidden" name="correct[]" value="0" id="flexCheckDefault">\
                     <input class="form-check-input" type="checkbox" name="correct[]" value="1" id="flexCheckDefault">';

            let multiple = '<input class="btn btn-warning" type="button" name="addOption" id="addOption" value="+option">\
                     <div id="option">\
                         <div class="optionSetup">\
                             <input type="text" class="form-control" name="option[]" value="">\
                             <input  class="form-check-input" type="hidden" name="correct[]" value="0" id="flexCheckDefault">\
                             <input class="form-check-input" type="checkbox" name="correct[]" value="1" id="flexCheckDefault">\
                             <input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer">\
                         </div>\
                         <div class="optionSetup">\
                             <input type="text" class="form-control" name="option[]" value="">\
                             <input  class="form-check-input" type="hidden" name="correct[]" value="0" id="flexCheckDefault">\
                             <input class="form-check-input" type="checkbox" name="correct[]" value="1" id="flexCheckDefault">\
                             <input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer">\
                         </div>\
                     </div>';

            let html = '<div class="optionSetup">\
                                     <input type="text" class="form-control" name="option[]" value="">\
                                     <input  class="form-check-input" type="hidden" name="correct[]" value="0" id="flexCheckDefault">\
                                     <input class="form-check-input" type="checkbox" name="correct[]" value="1" id="flexCheckDefault">\
                                     <input class="btn btn-warning" type="button" name="remove" id="remove" value="Supprimer">\
                                 </div>';


            $(el).change(function ChangeInput(event){

                            if (event.target.value === 'truefalse') {
                                $(".truefalse").append(truefalse);
                                $(".multiple").empty();

                            } else if (event.target.value === 'multiple') {
                                $(".multiple").append(multiple);
                                $(".truefalse").empty();
                                    $("#addOption").click(function() {
                                        $("#option").append(html);
                                    });
                                    $(".multiple").on('click', '#remove', function() {
                                        $(this).closest('.optionSetup').remove();
                                    });

                            } else if (event.target.value === '') {
                                $(".multiple").empty();
                                $(".truefalse").empty();
                            };
                        });






            // let question =
            //         `<label class="labels">Question?</label> <input class="form-control" type="text" name="question[]" required=""> <label class="labels">Point de la question</label> <input class="form-control" type="text" name="points[]" required=""> <select name="type[]" id="selecttype" class="test"> <option value="">--Choisi un type--</option> <option value="truefalse">Vrai Ou Faux</option> <option value="multiple">Choix Multiple</option> </select> <div class="truefalse"> </div><div class="multiple$"> </div><hr>`;

            // $("#addQuestion").click(function() {
            //     $(".questionOption").append(question);

            // });

            
            // let i = 0

            // function increment(i) {
            //     let question =
            //         `<label class="labels">Question?</label> <input class="form-control" type="text" name="question[]" required=""> <label class="labels">Point de la question</label> <input class="form-control" type="text" name="points[]" required=""> <select name="type[]" id="selecttype${i}" class="selecttype${i}"> <option value="">--Choisi un type--</option> <option value="truefalse">Vrai Ou Faux</option> <option value="multiple">Choix Multiple</option> </select> <div class="truefalse${i}"> </div><div class="multiple${i}"> </div><hr>`;
            //     return question;
            // }


            // $("#addQuestion").click(function() {
            //     i++;
            //     $(".questionOption").append(increment(i));

            // });

            // let truefalse = '<input type="text" class="form-control" name="option[]" value="Vrai" disabled="disabled">\
            //          <input  class="form-check-input" type="hidden" name="correct[]" value="0" id="flexCheckDefault">\
            //           <input class="form-check-input" type="checkbox" name="correct[]" value="1" id="flexCheckDefault">\
            //           <input type="text" class="form-control" name="option[]" value="Faux" disabled="disabled">\
            //          <input  class="form-check-input" type="hidden" name="correct[]" value="0" id="flexCheckDefault">\
            //           <input class="form-check-input" type="checkbox" name="correct[]" value="1" id="flexCheckDefault">';

            // $('.questionOption').each(function(){
            //     $('.selecttype', this).change(function ChangeInput(event){
            //         if (event.target.value === 'truefalse') {
            //                   $(".truefalse").append(truefalse);
            //                      $(".multiple").empty();

            //                  } else if (event.target.value === 'multiple') {
            //                      $(".multiple").append(multiple);
            //                      $(".truefalse").empty();
            //                          $("#addOption").click(function() {
            //                              $("#option").append(html);
            //                          });
            //                          $(".multiple").on('click', '#remove', function() {
            //                              $(this).closest('.optionSetup').remove();
            //                          });

            //                  } else if (event.target.value === '') {
            //                      $(".multiple").empty();
            //                      $(".truefalse").empty();
            //                };
            //     })
            // })




        });
    </script>
@endsection
