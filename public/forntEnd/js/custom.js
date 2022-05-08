$(document).ready(function() {
    loadcart();
    loadwishlist();

    function loadcart() {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function(response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);

            }
        })
    }

    function loadwishlist() {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-data",
            success: function(response) {
                $('.wish-count').html('');
                $('.wish-count').html(response.count);

            }
        })
    }
    $('.addtocartbtn').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },

            success: function(response) {
                loadcart();
                swal(response.status);
            }

        });

    });

    $('.addTowishlist').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        console.log(product_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,

            },

            success: function(response) {
                loadwishlist();
                swal(response.status);
            }

        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete_item').click(function(e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete_cart_item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");
            }

        })

    });
    //delete wishlist
    $('.remove_wishlist').click(function(e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete_wishlist_item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");
            }

        })

    });
    $('.changeQuentity').click(function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }

        $.ajax({
            method: "POST",
            url: "update_cart",
            data: data,

            success: function(response) {
                window.location.reload();


            }

        })
    });

})