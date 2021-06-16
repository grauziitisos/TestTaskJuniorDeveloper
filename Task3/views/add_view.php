<script type="text/javascript">
    function validateDimension(selector, dimension) {
        var attr = $(selector).val();
        if (attr.length < 1) {
            $(selector).after('<span class="error">Please, submit required data</span>');
        } else {
            var regEx = /^[0-9]+$/;
            var validSize = regEx.test(attr);
            if (!validSize) {
                $(selector).after('<span class="error">Enter a valid ' + dimension + '</span>');
            }
        }
    }

    $(document).ready(function () {
        $('#productType').val('0');
        $("#detailsBook").hide();
        $("#detailsFurniture").hide();
        $("#product_form").attr("action", "add-DVD");
        $("#btnCancel").click(function () {
            window.location = "<?php echo $_SERVER['PHP_SELF'] ?>";
        });
        $('#productType').on('change', function () {
            switch (this.value) {
                case '0':
                    $("#detailsBook").hide();
                    $("#detailsFurniture").hide();
                    $("#detailsDVD").show();
                    $("#product_form").attr("action", "add-DVD");
                    break;
                case '1':
                    $("#detailsBook").show();
                    $("#detailsFurniture").hide();
                    $("#detailsDVD").hide();
                    $("#product_form").attr("action", "add-book");
                    break;
                case '2':
                    $("#detailsBook").hide();
                    $("#detailsFurniture").show();
                    $("#detailsDVD").hide();
                    $("#product_form").attr("action", "add-furniture");
                    break;
                default:
                    $("#detailsBook").hide();
                    $("#detailsFurniture").hide();
                    $("#detailsDVD").show();
                    $("#product_form").attr("action", "add-DVD");
                    break;
            }
        });

        $('#product_form').submit(function (e) {
            var sku = $('#sku').val();
            var name = $('#name').val();
            var price = $('#price').val();

            $(".error").remove();

            if (sku.length < 1) {
                $('#sku').after('<span class="error">Please, submit required data</span>');
            } else {
                if (sku.indexOf('<') > -1)
                    $('#sku').after('<span class="error">Please do nut use &lt; character</span>');
            }
            if (name.length < 1) {
                $('#name').after('<span class="error">Please, submit required data</span>');
            } else {
                if (name.indexOf('<') > -1)
                    $('#name').after('<span class="error">Please do nut use &lt; character</span>');
            }
            if (price.length < 1) {
                $('#price').after('<span class="error">Please, submit required data</span>');
            } else {
                var regEx = /^[0-9]+(\.[0-9][0-9]?)?$/;
                var validPrice = regEx.test(price);
                if (!validPrice) {
                    $('#price').after('<span class="error">Enter a valid price</span>');
                }
            }
            if ($('#productType').val() == "0") {
                var attr = $('#size').val();
                if (attr.length < 1) {
                    $('#size').after('<span class="error">Please, submit required data</span>');
                } else {
                    var regEx = /^[0-9]+$/;
                    var validSize = regEx.test(attr);
                    if (!validSize) {
                        $('#size').after('<span class="error">Enter a valid size in MB</span>');
                    }
                }
            } else if ($('#productType').val() == "1") {
                var attr = $('#weight').val();
                if (attr.length < 1) {
                    $('#weight').after('<span class="error">Please, submit required data</span>');
                } else {
                    var regEx = /^[0-9]+$/;
                    var validSize = regEx.test(attr);
                    if (!validSize) {
                        $('#weight').after('<span class="error">Enter a valid weight</span>');
                    }
                }
            } else {
                validateDimension('#height', 'Height');
                validateDimension('#width', 'Width');
                validateDimension('#length', 'Length');
            }
            if ($(".error").length > 0) {
                e.preventDefault();
            }
        });

    })
</script>
<form method="post" id="product_form" action="add-product">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Product Add</h1>
            </div>
            <div class="col col-lg-1 align-self-center">
                <input type="submit" id="btnSave" value="Save"/>
            </div>
            <div class="col col-lg-1 align-self-center">
                <input type="button" id="btnCancel" value="cancel" name="cancel"/>
            </div>
        </div>
    </div>

    <hr/>
    <div class="form-group row">
        <label for="sku" class="col-sm-2 col-form-label">Sku</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="sku" name="sku">
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
        <div class="col-sm-4">
            <input type="text" pattern="[0-9]+(\.[0-9][0-9]?)?" class="form-control" id="price" name="price">
        </div>
    </div>
    <div class="form-group row">
        <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
        <div class="col-sm-4">
            <select id="productType" class="form-control" name="productType">
                <option value="0" label="DVD" id="DVD">DVD</option>
                <option value="1" label="Book" id="Book">Book</option>
                <option value="2" label="Furniture" id="Furniture">Furniture</option>
            </select>
        </div>
    </div>
    <div id="detailsDVD">
        <div class="form-group row">
            <div class="col-sm-2"></div>

            <div class="col-sm-4">
                <span class="help-block">Please, provide size for the DVD.</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="size" name="size">
            </div>
        </div>
    </div>
    <div id="detailsBook">
        <div class="form-group row">
            <div class="col-sm-2"></div>

            <div class="col-sm-4">
                <span class="help-block">Please, provide weight</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="weight" name="weight">
            </div>
        </div>
    </div>
    <div id="detailsFurniture">
        <div class="form-group row">
            <div class="col-sm-2"></div>

            <div class="col-sm-4">
                <span class="help-block">Please, provide dimensions for the Furniture.</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="height" name="height">
            </div>
        </div>
        <div class="form-group row">
            <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="width" name="width">
            </div>
        </div>
        <div class="form-group row">
            <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="length" name="length">
            </div>
        </div>
    </div>
    </div>
</form>