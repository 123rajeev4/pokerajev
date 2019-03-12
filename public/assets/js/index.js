$(document).ready(function(){
  //Chosen
  $(".limitedNumbChosen").chosen({
		max_selected_options: 2,
    placeholder_text_multiple: "Which are two of most productive days of your week"
	})
	.bind("chosen:maxselected", function (){
		window.alert("You reached your limited number of selections which is 2 selections!");
	})
  //Select2
  $(".limitedNumbSelect2").select2({
		maximumSelectionLength: 2,
    placeholder: "Which are two of most productive days of your week"
	})
});