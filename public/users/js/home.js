var quantity = 0;
$(document).ready(function () {
    $(document).click(function (e) {
        const modal_search = $("#results-search");
        const inputSearch = $("#search");
        const search_results_mobile = $(".results-box");
        const inputSearchSidebar = $("#search_input");
        // // Nếu click bên ngoài đối tượng container thì ẩn nó đi
        if (
            !modal_search.is(e.target) &&
            modal_search.has(e.target).length === 0
        ) {
            modal_search.hide();
        }
        if (inputSearch.is(e.target)) {
            modal_search.show();
        }
        if (
            !search_results_mobile.is(e.target) &&
            search_results_mobile.has(e.target).length === 0
        ) {
            search_results_mobile.hide();
        }

        if (inputSearchSidebar.is(e.target)) {
            search_results_mobile.show();
        }
    });
    $(".section-detail .list-item .add-cart").click(function (event) {
        event.preventDefault();
        var account = $(this).data("account");
        var verify = $(this).data("verify");
        if (account == 1) {
            var href = $(this).attr("href");
            quantity = $(this).data("quantity");
            var hrefCart = $(this).data("url");
            var infoProduct = $(".modal-content .modal-header .info-product");
            var colorProduct = $(".modal-body .choose-color .desc");
            var num = $("#num-order-cart-wp .num-order").attr("value");

            if (quantity >= num) {
                $.ajax({
                    url: href,
                    method: "GET",
                    data: {},
                    dataType: "json",
                    success: function (data) {
                        if (data.code == 200) {
                            var product = data.product; //type json
                            // Insert info product
                            $(infoProduct).html(
                                '<h4 class="modal-title">' +
                                    product.name +
                                    "</h4>" +
                                    '<h6 class="modal-price">' +
                                    data.priceProduct +
                                    "đ</h6>"
                            );

                            // Insert color product
                            $(colorProduct).html(
                                data.txt_color + data.txt_size
                            );

                            //Show modal
                            $("#modal-product-cart").modal("show");
                            //Active color
                            $(".desc .product-color").click(function () {
                                $(".desc .product-color.active").removeClass(
                                    "active"
                                );
                                $(this)
                                    .find("input[name=check-color-cart]")
                                    .prop("checked", true);
                                $(this).addClass("active");
                            });
                            //Active size
                            $(".desc .product-size").click(function () {
                                $(".desc .product-size.active").removeClass(
                                    "active"
                                );
                                $(this)
                                    .find("input[name=check-size-cart]")
                                    .prop("checked", true);
                                $(this).addClass("active");
                            });
                            $(".modal-footer .product-cart").attr(
                                "href",
                                hrefCart
                            );

                            //Reset lại num-order khi ẩn modal
                            $("#modal-product-cart").on(
                                "hide.bs.modal",
                                function () {
                                    $("#num-order-cart-wp .num-order").attr(
                                        "value",
                                        1
                                    ); //Value có thể thay đổi được

                                    //Value bị cố định là 1
                                    // $("#num-order-wp .num-order").val(1);
                                }
                            );
                        }
                    },
                });
            } else {
                // alert('Số lượng còn ' + quantity + ' xin chọn lại');
                $("#modalCart").modal("show");
            }
        } else {
            $("#modalAccount").modal("show");
        }
    });

    $(".modal-footer .product-cart").click(function (event) {
        event.preventDefault();
        var productColorId = $("input[name=check-color-cart]:checked").val();
        var productSizeId = $("input[name=check-size-cart]:checked").val(); //Tìm input radio được check
        var num = $("#num-order-cart-wp input[name=num-order]").val();
        var href = $(this).attr("href");
        var urlImg = $(".product-color.active")
            .children(".img-product")
            .find("img")
            .attr("src");
        if (quantity >= num) {
            $.ajax({
                url: href,
                method: "GET",
                data: {
                    productColorId: productColorId,
                    productSizeId: productSizeId,
                    num: num,
                },
                dataType: "json",
                success: function (data) {
                    if (data.code == 200) {
                        //An Modal cũ
                        $("#modal-product-cart").modal("hide");
                        //Gán urlImg vào src
                        $(".modal-body img.img_product_modal").attr(
                            "src",
                            urlImg
                        );
                        $(".modal-body .title_modal>b").html(data.name); //Gán name cho product
                        //Thiết lập load lại dropdown
                        // setInterval(function () {
                        //     $("#dropdown-cart-wp").load(
                        //         location.href + " #dropdown-cart-wp"
                        //     );
                        // }, 2000);

                        $(".num-total").text(data.num); //gán Số lượng đơn hàng

                        //Hiện modal thông báo
                        $("#modal-notification").modal("show");
                        // alert(data.code);
                    }
                },
            });
        } else {
            alert("Số lượng còn " + quantity + " xin chọn lại");
        }
    });

    $("#search").keyup(function () {
        var href = $(this).data("url");
        var kw = $(this).val();
        if (kw != "") {
            $.ajax({
                url: href,
                method: "GET",
                data: { kw: kw },
                dataType: "json",
                success: function (data) {
                    if (data.code == 200) {
                        $("#results-search").fadeIn();
                        $("#results-search").html(data.text);
                    }
                },
            });
        } else {
            $("#results-search").fadeOut();
        }
    });
    $("#search_header").click(function () {
        $(".search_sidebar").css("transform", "translateX(0)");
    });
    $(".close_search").click(function () {
        $(".search_sidebar").css("transform", "translateX(100%)");
    });
    $("#search_input").keyup(function () {
        var href = $(this).data("url");
        var kw = $(this).val();
        if (kw != "") {
            $.ajax({
                url: href,
                method: "GET",
                data: { kw: kw },
                dataType: "json",
                success: function (data) {
                    if (data.code == 200) {
                        $(".search-results").fadeIn();
                        $(".search-results").html(data.text);
                    }
                },
            });
        } else {
            $(".search-results").fadeOut();
        }
    });
    $("#search_input").click(function () {
        $(".results-box").removeClass("d-none");
        $(".delete_search").removeClass("d-none");
    });
    $(".delete_search").click(function () {
        $("#search_input").val("");
        $(".search-results").html("");
        $(this).addClass("d-none");
    });
});
