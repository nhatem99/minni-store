$(document).ready(function () {
    $(".nav-link.active .sub-menu").slideDown();
    // $("p").slideUp();

    $("#sidebar-menu .arrow").click(function () {
        $(this).parents("li").children(".sub-menu").slideToggle();
        $(this).toggleClass("fa-angle-right fa-angle-down");
    });

    $("input[name='checkall']").click(function () {
        var checked = $(this).is(":checked");
        $(".table-checkall tbody tr td input:checkbox").prop(
            "checked",
            checked
        );
    });

    $("#avatar").click(function (e) {
        document.querySelector("[name='feature_image']").click();
    });
    $("#avatar-banner").click(function (e) {
        $("#input-banner").click();
    });
    $("#avatar-2").click(function () {
        document.querySelector("[name='feature_image2']").click();
        
    });
    $("#avatar-3").click(function () {
        document.querySelector("[name='image_product']").click();
        
    });

    $(".alert")
        .fadeTo(2000, 500)
        .slideUp(500, function () {
            $("#success-alert").slideUp(500);
        });
});

function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function (e) {
            //Thay đổi đường dẫn ảnh
            const data_name = $(input).data('img');
            $('#'+ data_name).attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
