$(document).ready(function () {
    $.ajax({
        url: '../php/money_chart_data.php',
        dataType: 'json',
        success: function (data) {
            drawMoneyChart(data);
        }
    });

    $.ajax({
        url: '../php/sold_items_chart_data.php',
        dataType: 'json',
        success: function (data) {
            drawItemsChart(data);
        }
    });

    function drawMoneyChart(data) {
        var canvas = document.getElementById('money_sum_chart');
        canvas.width = 400;
        canvas.height = 400;

        var chart = new BarChart({
            canvas: canvas,
            padding: 20,
            gridScale: 100,
            gridColor: '#5c6b73',
            data: data,
            colors: ["#253237"]
        });
        chart.draw();
    }

    function drawItemsChart(data) {
        var canvas = document.getElementById('stock_sum_chart');
        canvas.width = 400;
        canvas.height = 400;

        var chart = new BarChart({
            canvas: canvas,
            padding: 20,
            gridScale: 2,
            gridColor: '#5c6b73',
            data: data,
            colors: ["#253237"]
        });
        chart.draw();
    }

    function drawLine(ctx, startX, startY, endX, endY, color) {
        ctx.save();
        ctx.strokeStyle = color;
        ctx.beginPath();
        ctx.moveTo(startX, startY);
        ctx.lineTo(endX, endY);
        ctx.stroke();
        ctx.restore();
    }

    function drawBar(ctx, leftCUpX, leftCUpY, width, height, color) {
        ctx.save();
        ctx.fillStyle = color;
        ctx.fillRect(leftCUpX, leftCUpY, width, height);
        ctx.restore();
    }

    class BarChart {
        constructor(options) {
            this.options = options;
            this.canvas = options.canvas;
            this.ctx = this.canvas.getContext('2d');
            this.colors = options.colors;
            this.titleOptions = options.titleOptions;
            this.maxValue = Math.max(...Object.values(this.options.data));
            this.dates = Object.keys(this.options.data);
        }
        drawGridLines() {
            var canvasActualHeight = this.canvas.height - this.options.padding * 2;

            var gridValue = 0;
            while (gridValue <= this.maxValue) {
                var gridY = canvasActualHeight * (1 - gridValue / this.maxValue) + this.options.padding;

                var text = gridValue.toString();
                var textWidth = this.ctx.measureText(text).width;
                var maxTextWidth = this.ctx.measureText(this.maxValue.toString()).width;

                var marginLeft = maxTextWidth - textWidth;

                this.ctx.save()
                this.ctx.fillStyle = this.options.gridColor;
                this.ctx.textBaseline = "bottom";
                this.ctx.font = "bold 10px Arial";

                var x = this.options.padding + marginLeft - 25;

                this.ctx.fillText(text, x, gridY - 2);
                this.ctx.restore();

                drawLine(this.ctx, 0, gridY, this.canvas.width, gridY, this.options.gridColor);
                drawLine(this.ctx, 24, this.options.padding / 2, 24, gridY + this.options.padding / 2, this.options.gridColor);

                gridValue += this.options.gridScale;
            }
        }

        drawBars() {
            var canvasActualHeight = this.canvas.height - this.options.padding * 2;
            var canvasActualWidth = this.canvas.width - this.options.padding * 2;

            var barIndex = 0;
            var numberOfBars = Object.keys(this.options.data).length;
            var barSize = canvasActualWidth / numberOfBars;

            var values = Object.values(this.options.data);

            for (let val of values) {
                var barHeight = Math.round((canvasActualHeight * val) / this.maxValue);

                drawBar(this.ctx, this.options.padding + 5 + barIndex * barSize + 5, this.canvas.height - barHeight - this.options.padding, barSize - 5, barHeight, this.colors[barIndex % this.colors.length]);
                this.ctx.save();
                this.ctx.fillStyle = this.options.gridColor;
                this.ctx.textBaseline = "top";
                this.ctx.font = "bold 10px Arial";

                var dateText = this.dates[barIndex];
                var dateTextWidth = this.ctx.measureText(dateText).width;
                var dateX = this.options.padding + 20 + barIndex * barSize + (barSize - dateTextWidth) / 2;
                var dateY = this.canvas.height - this.options.padding + 5;

                var formattedDate = dateText.substr(0, 6);

                this.ctx.fillText(formattedDate, dateX, dateY);
                this.ctx.restore();

                barIndex++;
            }
        }
        draw() {
            this.drawGridLines();
            this.drawBars();
        }
    }

    var products_open = false;
    var product_add_open = false;

    $('#show_products_button').click(function () {
        if (products_open == false && product_add_open == false) {
            products_open = true;
            $(this).toggleClass('rotate');
            $('#admin_body').removeClass('smaller_bg').addClass('bigger_bg');
            $.ajax({
                url: '../php/admin_show_products.php',
                method: 'GET',
                success: function (response) {
                    $('#admin_products').html(response);
                }
            });
        } else {
            products_open = false;
            product_add_open = false;
            $('#admin_body').removeClass('bigger_bg').addClass('smaller_bg');
            $(this).toggleClass('rotate');
            $('#admin_products').html('');
        }
    });

    $('#add_product_button').click(function () {
        if (products_open == false && product_add_open == false) {
            product_add_open = true;
            $('#show_products_button').toggleClass('rotate');
            $('#admin_body').removeClass('smaller_bg').addClass('bigger_bg');
            $.ajax({
                url: '../php/admin_show_product_add.php',
                method: 'GET',
                success: function (response) {
                    $('#admin_products').html(response);
                }
            });
        } else if (products_open == true) {
            $('#admin_body').removeClass('smaller_bg').addClass('bigger_bg');
            $('#admin_products').html('');
            products_open = false;
            product_add_open = true;
            $.ajax({
                url: '../php/admin_show_product_add.php',
                method: 'GET',
                success: function (response) {
                    $('#admin_products').html(response);
                }
            });
        }
    });

    $(document).on('click', '.admin_item_delete', function () {
        var itemID = $(this).data('id');
        var itemToDelete = $(this).closest('.admin_product_item');
        $.ajax({
            url: '../php/admin_delete_item.php',
            method: 'POST',
            data: { id: itemID },
            success: function (response) {
                if (response == 'success') {
                    itemToDelete.remove();
                } else {
                    alert('Fehler beim löschen des Produkts');
                }
            }
        });
    });

    $('#admin_add_item_cancel').click(function () {
        product_add_open = false;
        $('#show_products_button').toggleClass('rotate');
        $('#admin_body').removeClass('bigger_bg').addClass('smaller_bg');
        $('#admin_products').html('');
    });

    $(document).on('submit', '#add_form', function (event) {
        event.preventDefault();
        var itemId = $('#admin_item_id').val();
        var formData = new FormData(this);

        if (itemId.trim() === '') {
            $.ajax({
                method: 'POST',
                url: '../php/admin_add_product.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function () {
                    product_add_open = false;
                    $('#admin_body').removeClass('bigger_bg').addClass('smaller_bg');
                    $('#admin_products').html('');
                }
            });
        } else {
            $.ajax({
                method: 'POST',
                url: '../php/admin_update_product.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    product_add_open = false;
                    $('#admin_body').removeClass('bigger_bg').addClass('smaller_bg');
                    $('#admin_products').html('');
                }
            });
        }

    });

    $(document).on('click', '.admin_item_edit', function () {
        var itemID = $(this).data('id');
        var itemPrice = parseFloat($(this).data('price'));
        var itemName = $(this).data('name');
        var itemBrand = $(this).data('brand');
        var itemStock = $(this).data('stock');
        var itemDescription = $(this).data('description');
        var itemPicture = $(this).data('picture');

        products_open = false;
        $('#admin_products').html('');
        $('#admin_body').toggleClass('bigger_bg');
        $.ajax({
            url: '../php/admin_show_product_add.php',
            method: 'GET',
            success: function (response) {
                product_add_open = true;
                $('#admin_products').html(response);
                $('#add_item_name').val(itemName);
                $('#add_item_brand').val(itemBrand);
                $('#add_item_price').val(itemPrice);
                $('#add_item_stock').val(itemStock);
                $('#add_item_description').val(itemDescription);
                $('#admin_item_id').val(itemID);
            }
        });
    });

    var users_open = false;
    var users_add_open = false;

    $('#admin_show_users_button').click(function () {
        if (users_open == false && users_add_open == false) {
            users_open = true;
            $('#admin_body').removeClass('smaller_bg').addClass('bigger_bg');
            $(this).toggleClass('rotate');
            $.ajax({
                url: '../php/admin_show_users.php',
                method: 'GET',
                success: function (response) {
                    $('#admin_users').html(response);
                }
            });
        } else {
            users_open = false;
            users_add_open = false;
            $(this).toggleClass('rotate');
            $('#admin_body').removeClass('bigger_bg').addClass('smaller_bg');
            $('#admin_users').html('');
        }
    });

    $('#add_users_button').click(function () {
        if (users_open == false && users_add_open == false) {
            users_add_open = true;
            $('#admin_show_users_button').toggleClass('rotate');
            $('#admin_body').removeClass('smaller_bg').addClass('bigger_bg');
            $.ajax({
                url: '../php/admin_show_users_add.php',
                method: 'GET',
                success: function (response) {
                    $('#admin_users').html(response);
                }
            });
        } else if (users_open == true) {
            $('#admin_users').html('');
            users_open = false;
            users_add_open = true;
            $('#admin_body').removeClass('smaller_bg').addClass('bigger_bg');
            $.ajax({
                url: '../php/admin_show_users_add.php',
                method: 'GET',
                success: function (response) {
                    $('#admin_users').html(response);
                }
            });
        }
    });

    $(document).on('click', '.admin_user_delete', function () {
        var itemID = $(this).data('id');
        var itemToDelete = $(this).closest('.admin_product_item');
        $.ajax({
            url: '../php/admin_delete_user.php',
            method: 'POST',
            data: { id: itemID },
            success: function (response) {
                if (response == 'success') {
                    itemToDelete.remove();
                } else {
                    alert('Fehler beim löschen des Users');
                }
            }
        });
    });

    $('#admin_add_user_cancel').click(function () {
        users_add_open = false;
        $('#admin_show_users_button').toggleClass('rotate');
        $('#admin_body').removeClass('bigger_bg').addClass('smaller_bg');
        $('#admin_users').html('');
    });

    $(document).on('submit', '#add_user_form', function (event) {
        event.preventDefault();
        $.ajax({
            method: 'POST',
            url: '../php/admin_add_user.php',
            data: $(this).serialize(),
            success: function () {
                users_add_open = false;
                $('#admin_body').removeClass('bigger_bg').addClass('smaller_bg');
                $('#admin_users').html('');
            }
        });
    });

});