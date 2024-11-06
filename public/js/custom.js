// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// isotope js
$(window).on('load', function () {
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })
});

// nice select
$(document).ready(function() {
    $('select').niceSelect();
  });

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});



$(document).ready(function() {
    // عند الضغط على عنصر في قائمة التصفية
    $('.filters_menu li').on('click', function() {
        var filterValue = $(this).attr('data-filter');
        // تغيير الفئة النشطة
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        // تصفية العناصر
        $('.grid .col-sm-6').hide(); // إخفاء جميع العناصر
        if (filterValue === '*') {
            $('.grid .col-sm-6').show(); // إظهار جميع العناصر إذا تم اختيار "كل"
        } else {
            $('.grid .col-sm-6' + filterValue).show(); // إظهار العناصر التي تطابق الفئة المختارة
        }
    });
});



document.querySelectorAll('.quantity-increase').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.previousElementSibling;
        input.value = parseInt(input.value) + 1;
    });
});

document.querySelectorAll('.quantity-decrease').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.nextElementSibling;
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
        }
    });
});

    document.addEventListener('DOMContentLoaded', function() {
        const quantityInputs = document.querySelectorAll('input[name="quantity"]');

        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                const form = this.closest('form');
                form.submit(); // إرسال النموذج تلقائيًا عند تغيير القيمة
            });
        });
    });
    // $(document).ready(function() {
    //     $('#datatable').DataTable({
    //         searching: false // This will disable the search box
    //     });
    // });

