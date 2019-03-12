$(document).ready(function(){
    
    // cuurent city section
     $(".image-radio").on("click", function(e){
        $(".image-radio").removeClass('rightcuntry');
        $(this).addClass('rightcuntry');
        var $radio = $(this).find('input[type="radio"]');
        $radio.prop("checked",!$radio.prop("checked"));

        e.preventDefault();
    });
    
	
	
$('#datepairExample .time').timepicker({
				'showDuration': true,
				'timeFormat': 'g:ia'
			});
    
})



// js for Header Fixed Ajeet * //

$(function() {
    var nav = $(".statichdr");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 90) {
            nav.removeClass('statichdr').addClass("navfixed");
        } else {
            nav.removeClass("navfixed").addClass('statichdr');
        }
    });
});


// js for open menu Ajeet *//

$(".toggledivmen").click(function (e) {
    e.stopPropagation();
    $(".menu-section").toggleClass('new-opns');
});

$(".toggledivmen").click(function (e) {
    e.stopPropagation();
    $(".toggledivmen").toggleClass('cross');
});


$(".userprofile").click(function (e) {
    e.stopPropagation();
    $(".userlistingopn").toggleClass('openpanel');
});







// js for More Page Tabs *//


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function openPosts(evt, postsName) {
    var i, postadcontent, posttablinks;
    postadcontent = document.getElementsByClassName("postadcontent");
    for (i = 0; i < postadcontent.length; i++) {
        postadcontent[i].style.display = "none";
    }
    posttablinks = document.getElementsByClassName("posttablinks");
    for (i = 0; i < posttablinks.length; i++) {
        posttablinks[i].className = posttablinks[i].className.replace(" active", "");
    }
    document.getElementById(postsName).style.display = "block";
    evt.currentTarget.className += " active";
}

// js for profile edits //

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var profilepanel = this.nextElementSibling;
    if (profilepanel.style.maxHeight){
      profilepanel.style.maxHeight = null;
    } else {
      profilepanel.style.maxHeight = profilepanel.scrollHeight + "px";
    } 
  });
}


//js for pasword shows forms 

function showpasswordFunction() {
    var x = document.getElementById("inputPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showconfimpasswordFunction() {
    var x = document.getElementsByClassName("oppwasconf");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


$(document).ready(function(){

	$("#inputPassword").focus();
	
	$("#pwchecknext").click(function(){
        if ($("#pwchecknext").is(":checked"))
        {
            $(".oppwasconf").clone()
            .attr("type", "text").insertAfter(".oppwasconf")
            .prev().remove();
        }
        else
        {
            $(".oppwasconf").clone()
            .attr("type","password").insertAfter(".oppwasconf")
            .prev().remove();
        }
    });
});


// js for reply section 



	$(document).ready(function() {
	function close_accordion_section() {
		$('.accordion-section-title').removeClass('active');
		$('.accordion-section-content').slideUp(300).removeClass('open');
	}

	$('.accordion-section-title').click(function(e) {
		// Grab current anchor value
		var currentAttrValue = $(this).attr('href');

		if($(e.target).is('.active')) {
			close_accordion_section();
		}else {
			close_accordion_section();

			// Add active class to section title
			$(this).addClass('active');
			// Open up the hidden content panel
			$('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
		}

		e.preventDefault();
	});
});

//  js for time pickers 

   
