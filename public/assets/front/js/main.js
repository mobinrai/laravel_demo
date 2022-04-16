$(document).on('ready', function () {
    'use strict';
    $('.tg-themetabnav > li > a').hover(function () {
        $('.mega-menu .tg-themetabcontent').show();
        $(this).tab('show');
    });

    var _tg_btnscrolltop = $('#tg-btnbacktotop');
    _tg_btnscrolltop.on('click', function () {
        var _scrollUp = $('html, body');
        _scrollUp.animate({scrollTop: 0}, 'slow');
    })


    function collapseMenu() {
        $('.menu-item-has-children, .menu-item-has-mega-menu').prepend('<span class="tg-dropdowarrow"><i class="fa  fa-angle-right"></i></span>');
        $('.menu-item-has-children span, .menu-item-has-mega-menu span').on('click', function () {
            $(this).next().next().slideToggle(300);
            $(this).parent('.menu-item-has-children, .menu-item-has-mega-menu').toggleClass('tg-open');
        });
    }

    collapseMenu();

    var _tg_homeslider = $('#tg-homeslider');
    _tg_homeslider.owlCarousel({
        items: 1,
        nav: true,
        loop: true,
        dots: true,
        autoplay: true,
        autoplayHoverPause: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
    });

    var _tg_bestsellingbooksslider = jQuery('.tg-bestsellingbooksslider');
    _tg_bestsellingbooksslider.owlCarousel({
        nav: true,
        loop: false,
        margin: 30,
        autoplay: true,
        autoplayHoverPause: true,
        dots: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
        responsive: {
            0: {items: 2},
            480: {items: 2},
            600: {items: 3},
            1000: {items: 5},
            1200: {items: 6},
        }
    });

    var _tg_relatedproductslider = $('#tg-relatedproductslider');
    _tg_relatedproductslider.owlCarousel({
        nav: true,
        loop: false,
        margin: 30,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
        responsive: {
            0: {items: 1},
            480: {items: 2},
            600: {items: 3},
            1000: {items: 5},
            1200: {items: 6},
        }
    });

    var _tg_pickedbyauthorslider = $('#tg-pickedbyauthorslider');
    _tg_pickedbyauthorslider.owlCarousel({
        nav: true,
        loop: true,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
        responsive: {
            0: {items: 1},
            768: {items: 2},
            992: {items: 3},
        }
    });
    /*--------------------------------------
            TESTIMONIALS SLIDER
    --------------------------------------*/
    var _tg_testimonialsslider = $('#tg-testimonialsslider');
    _tg_testimonialsslider.owlCarousel({
        items: 1,
        nav: true,
        loop: true,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
    });
    /*--------------------------------------
            PICKED BY AUTHOR SLIDER
    --------------------------------------*/
    var _tg_authorsslider = $('#tg-authorsslider');
    _tg_authorsslider.owlCarousel({
        nav: true,
        loop: true,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
        responsive: {
            0: {items: 1},
            600: {items: 4},
            1000: {items: 5},
            1200: {items: 6},
        }
    });

    var _tg_teamsslider = $('#tg-teamsslider');
    _tg_teamsslider.owlCarousel({
        nav: true,
        loop: true,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
        responsive: {
            0: {items: 1},
            600: {items: 3},
            1000: {items: 4},
        }
    });

    /*--------------------------------------
            HOME SLIDER
    --------------------------------------*/
    var _tg_successslider = $('#tg-successslider');
    _tg_successslider.owlCarousel({
        items: 1,
        nav: true,
        loop: true,
        dots: true,
        autoplay: true,
        navText: [
            '<i class="icon-chevron-left"></i>',
            '<i class="icon-chevron-right"></i>'
        ],
        navClass: [
            'owl-prev tg-btnround tg-btnprev',
            'owl-next tg-btnround tg-btnnext'
        ],
    });
    /* -------------------------------------
            Google Map
    -------------------------------------- */
    /*$("#tg-locationmap").gmap3({
        marker: {
            address: "1600 Elizabeth St, Melbourne, Victoria, Australia",
            options: {
                title: "Books Library",
            }
        },
        map: {
            options: {
                zoom: 16,
                scrollwheel: false,
                disableDoubleClickZoom: true,
            }
        }
    });*/


    $('.ryzer-quantity').each(function () {
        var self = $(this),
            input = self.find('input[type="number"]'),
            btnUp = self.find('em.plus'),
            btnDown = self.find('em.minus'),
            min = input.attr('min'),
            max = input.attr('max');


        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            var newVal = 0;
            if (oldValue >= max) {
                newVal = oldValue;
            } else {
                newVal = oldValue + 1;
            }
            self.find('input').val(newVal);
            self.find('input').trigger('change');
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            var newVal = 0;
            if (oldValue <= min) {
                newVal = oldValue;
            } else {
                newVal = oldValue - 1;
            }
            self.find('input').val(newVal);
            self.find('input').trigger('change');
        });

    });


});

$(document).on('ready', function () {
    $(document).on('ifChecked', '#accept_terms_and_conditions', function () {
        $('#btnRegister').removeAttr('disabled');
    });
    $(document).on('ifUnchecked', '#accept_terms_and_conditions', function () {
        $('#btnRegister').attr('disabled', true);
    });
});

function successToast(response){
    $.toast({
        heading: response.title,
        text: response.message,
        position: 'top-center',
        stack: false,
        icon: 'success',
        loader: false,
        showHideTransition: 'slide'
    });
}
function errorToast(response){
    $.toast({
        heading: response.responseJSON.title,
        text: response.responseJSON.message,
        position: 'top-center',
        stack: false,
        icon: 'warning',
        loader: false,
        showHideTransition: 'slide'
    });
}

let baseUrl = document.head.querySelector('meta[name="base-url"]').content;

$(function () {
    autocomplete('#searchQuery', {
        minLength: 2,
        debug: false,
        hint: true,
    }, [
        {
            source: function (request, response) {
                var searchInput = $('#searchQuery').val();
                $.ajax({
                    url: baseUrl + '/book-suggest',
                    data: {query: searchInput},
                    dataType: 'json',
                    type: 'GET',
                    success: function (data) {
                        if (data.length > 5) {
                            if ($('.all-search-results').length) {
                                $('.all-search-results').replaceWith('<div class="all-search-results"><a href="' + baseUrl + '/search?query=' + searchInput + '">All results</a></div>');
                            } else {
                                $('.aa-dropdown-menu').append('<div class="all-search-results"><a href="' + baseUrl + '/search?query=' + searchInput + '">All results</a></div>');
                            }
                        } else {
                            $('.all-search-results').remove();
                        }
                        response($.map(data, function (obj) {
                            return {
                                title: obj.title,
                                path: obj.link,
                                isbn: obj.isbn,
                                isbn_13: obj.isbn_13,
                                edition: obj.edition,
                                publication: obj.publication.title,
                                author: obj.authors[0],
                                image: baseUrl + '/' + obj.main_image.image,
                            };
                        }));
                    }
                });
            },
            displayKey: 'title',
            templates: {
                suggestion: function (suggestion) {
                    var returnData =
                        '<div class="search-item">' +
                        '<div class="search-product-image">' +
                        '<a href="' + suggestion.path + '">' + '' +
                        '<img class="search-image" src="' + suggestion.image + '" alt="' + suggestion.title.substring(0, 15) + '">' +
                        '</a>' +
                        '</div>' +
                        '<div class="search-product-details">' +
                        '<a href="' + suggestion.path + '">' + '' +
                        '<span class="search-book-title">' + suggestion.title + '</span>' +
                        '<span class="search-book-details edition">ISBN : ' + suggestion.isbn_13 + '</span>' +
                        '<span class="search-book-details author">Author: ' + suggestion.author.first_name + ' ' + suggestion.author.middle_name + ' ' + suggestion.author.last_name + '</span>' +
                        '<span class="search-book-details publisher">Publisher: ' + suggestion.publication + '</span>' +
                        '</a>' +
                        '</div>' +
                        '</div>';
                    $('#test-search').html(returnData);
                    return returnData;
                }
            }
        }
    ]);
    $('#searchQuery').keyup(function () {
        var searchValue = this.value;

        if (searchValue) {
            $('.search-icon-magnifier').hide();
            $('.search-icon-cross').show();
        } else {
            $('.search-icon-cross').hide();
            $('.search-icon-magnifier').show();
        }
    });
    $('.search-icon-cross').click(function () {
        $(this).hide();
        $('.search-icon-magnifier').show();
        $('#searchQuery').trigger('autocomplete:reset');
    });
});

/*Quick View*/
$(document).on('click', '.quick-view', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var quickViewUrl = baseUrl + '/book-quick/' + id;
    $('#quickView').load(quickViewUrl, function () {
        $('#quickView').modal('show');
    });
});

/*News Letter Subscription Form*/
$(document).on('submit', '#subscriptionForm', function (e) {
    e.preventDefault();
    $(this).attr('disabled');
    var form = new FormData($(this)[0]);
    var myUrl = baseUrl + '/subscribe/newsletter';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: myUrl,
        contentType: false,
        processData: false,
        data: form,
        beforeSend: function () {
        },
        success: function () {
            $('#subscriptionForm').trigger('reset');
        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.addClass('is-invalid');
                    el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(10000));
                    setTimeout(function () {
                        el.removeClass('is-invalid');
                    }, 10000);
                });
            } else {
                errorToast(response);
            }
        }
    });
});
/*Contact Us*/
$(document).on('submit', '#contactForm', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: baseUrl + '/contact-us',
        contentType: false,
        processData: false,
        cache: false,
        data: formData,
        beforeSend: function () {
        },
        success: function (response) {
            $('#contactForm').trigger('reset');
            successToast(response);
        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.addClass('is-invalid');
                    el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(10000));
                    setTimeout(function () {
                        el.removeClass('is-invalid');
                    }, 10000);
                });
            } else {
                errorToast(response);
            }
        },
        complete: function () {
        }
    });
});
/*Donate Option*/
$(document).on('submit', '#donationForm', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: baseUrl + '/donate',
        contentType: false,
        processData: false,
        cache: false,
        data: formData,
        beforeSend: function () {
        },
        success: function (response) {
            $('#donationForm').trigger('reset');
            successToast(response);
            window.location = baseUrl;

        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.addClass('is-invalid');
                    el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(10000));
                    setTimeout(function () {
                        el.removeClass('is-invalid');

                    }, 10000);
                });
            } else {
                errorToast(response);
            }
        },
        complete: function () {
        }
    });
});
/*Sell Page*/
$(document).on('submit', '#bookSellForm', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: baseUrl + '/sell',
        contentType: false,
        processData: false,
        cache: false,
        data: formData,
        beforeSend: function () {
        },
        success: function (response) {
            $('#contactForm').trigger('reset');
            successToast(response);
            window.location = baseUrl;
        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.addClass('is-invalid');
                    el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(10000));
                    setTimeout(function () {
                        el.removeClass('is-invalid');

                    }, 10000);
                });
            }
            errorToast(response);
        },
        complete: function () {
        }
    });
});
/*Book Review*/
$(document).on('submit', '#bookReviewForm', function (e) {
    e.preventDefault();
    var form = new FormData($(this)[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: baseUrl + '/book-review/store',
        contentType: false,
        processData: false,
        data: form,
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (response) {
            successToast(response);
        },
        error: function (response) {
            errorToast(response);
        },
        complete: function () {
            $('#bookReviewForm').trigger('reset');
            $review.modal('hide');
        }
    });
});
/*Order cancellation*/

$(document).on('click', '.cancel-order', function (e) {
    e.preventDefault();
    var cancelOrderId = $(this).attr('data-id');
    $.confirm({
        icon: 'fa fa-exclamation-triangle',
        title: 'Are you sure to Cancel ?',
        content: 'Do You Want To Cancel Your Order!!!',
        type: 'red',
        typeAnimated: true,
        autoClose: 'cancelAction|9000',
        theme: 'material',
        closeIcon: true,
        animation: 'scale',
        closeAnimation: 'scale',
        buttons: {
            confirm: {
                text: 'Cancel Order',
                btnClass: 'btn-red',
                action: function () {
                    var tempDeleteUrl = baseUrl + '/customer/order-cancel/' + cancelOrderId;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'DELETE',
                        url: tempDeleteUrl,
                        success: function (response) {
                            $(e.target).parents('tr:first').remove();
                            successToast(response);
                        },
                        error: function (response) {
                            $.toast({
                                heading: response.responseJSON.title,
                                text: response.responseJSON.message,
                                position: 'top-center',
                                stack: false,
                                icon: 'warning',
                                loader: false,
                                showHideTransition: 'slide'
                            });
                        },
                    });
                }
            },
            cancelAction: {
                text: 'Cancel Action',
                action: function () {
                    $.toast({
                        heading: 'Cancellation Cancelled !',
                        text: 'No Action Occurred. Your order will be dispatched soon.',
                        position: 'top-center',
                        stack: false,
                        icon: 'success',
                        loader: false,
                    });
                }
            }
        }
    });
});


/*Rental Return */
$(document).on('click', '.btnViewRental', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var tempEditUrl = baseUrl + '/customer/rental/' + id;
    $('#quickModal').load(tempEditUrl, function () {
        $('#quickModal').modal('show');
    });
});

$(document).on('click', '.btnRentalReturnRequest', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var requestUrl = baseUrl + '/customer/rental-request-modal/' + id;
    $('#quickModal').load(requestUrl, function () {
        $('#quickModal').modal('show');
    });

});

$(document).on('submit', '#pickupRequestForm', function (e) {
    console.log('das');
    e.preventDefault();
    var id = $(this).attr('data-id');
    var requestUrl = baseUrl + '/customer/rental-request/' + id;

    var formData = new FormData($(this)[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: requestUrl,
        contentType: false,
        processData: false,
        cache: false,
        data: formData,
        beforeSend: function () {
        },
        success: function (response) {
            $('#quickModal').modal('hide');
            successToast(response);
        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.addClass('is-invalid');
                    el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(10000));
                    setTimeout(function () {
                        el.removeClass('is-invalid');
                    }, 10000);
                });
            } else {
                errorToast(response);
            }
        },
        complete: function () {
        }
    });
});


$(document).on('submit', '#checkoutForm', function (e) {
    e.preventDefault();
    var form = new FormData($(this)[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: baseUrl + '/checkout',
        contentType: false,
        processData: false,
        data: form,
        beforeSend: function () {
        },
        success: function (response) {
            $('#checkoutModal').html(response);
            $('#checkoutModal').modal({
                show: 'true',
                backdrop: 'static',
                keyboard: false
            });
        },
        error: function (response) {
            errorToast(response);
        }
    });
});

$(document).on('click', '#payWithCod', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var codUrl = baseUrl + '/checkout/cod/' + id;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: codUrl,
        beforeSend: function () {
        },
        success: function (response) {
            $('#checkoutModal').html(response);
            $('#checkoutModal').modal({
                show: 'true',
                backdrop: 'static',
                keyboard: false
            });
        },
        error: function (response) {
            errorToast(response);
        }
    });
});


$(document).on('click', '#login-modal,.login-modal', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: baseUrl + '/login-modal',
        beforeSend: function () {
        },
        success: function (response) {
            $('#authModal').html(response);
            $('#authModal').modal('show');
        },
        error: function () {
            location.reload();
        }
    });
});

$(document).on('click', '#forgot-pass-modal', function (e) {
    e.preventDefault();
    $('#authModal').load(baseUrl + '/forgot-password-modal', function () {
        $('#authModal').modal('show');
    });
});

$(document).on('click', '#register-modal', function (e) {
    e.preventDefault();
    $('#authModal').load(baseUrl + '/register-modal', function () {
        $('#authModal').modal('show');
    });
});


$(document).on('click', '.btnRemoveWishList', function (e) {
    e.preventDefault();
    var $this = $(this);
    var wishListId = $this.attr('data-id');
    if (wishListId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: baseUrl + '/customer/wishlist/destroy',
            data: {
                wishListId: wishListId
            },
            beforeSend: function () {
            },
            success: function (response) {
                $(e.target).parents('tr:first').remove();
                successToast(response);

                $('.itm-cont-wishlist').text(response.count);
                $this.addClass('add-to-wishlist');
                $this.removeClass('remove-from-wishlist');
                $this.attr('title', 'Add to Wishlist');

            },
            error: function (response) {
                errorToast(response);
            },
            complete: function () {
                $this.prop('disabled', false);
            }
        });
    }
});


/*Customer Profile*/

$(document).on('click', '#editProfile', function (e) {
    e.preventDefault();
    var tempEditUrl = baseUrl + '/customer/profile/edit';
    $('#customerModal').load(tempEditUrl, function () {
        $('#customerModal').modal('show');
    });
});

$(document).on('submit', '#updateProfile', function (e) {
    e.preventDefault();
    var form = new FormData($(this)[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: baseUrl + '/customer/profile/edit',
        contentType: false,
        processData: false,
        data: form,
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (response) {
            $('#customerModal').modal('hide');
            window.location.reload();
            successToast(response);

        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.addClass('is-invalid');
                    el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                    setTimeout(function () {
                        el.removeClass('is-invalid');
                    }, 8000);
                });
            } else {
                errorToast(response);
            }
        }
    });
});

$(document).on('click', '#changePassword', function (e) {
    e.preventDefault();
    $('#customerModal').load(baseUrl + '/customer/profile/edit-password', function () {
        $('#customerModal').modal('show');
    });
});

$(document).on('submit', '#updatePassword', function (e) {
    e.preventDefault();
    var form = new FormData($(this)[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: baseUrl + '/customer/profile/edit-password',
        contentType: false,
        processData: false,
        data: form,
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (response) {
            $('#customerModal').modal('hide');
            successToast(response);
        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.addClass('is-invalid');
                    el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                    setTimeout(function () {
                        el.removeClass('is-invalid');
                    }, 8000);
                });
            } else {
                errorToast(response);
            }
        }
    });
});




