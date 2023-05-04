@extends('layouts.backend.app')
@section('sidebarActive', $controller)

<!--begin::Vendor Stylesheets(used for this page only)-->
@push('private_css')
    <style>
        .card-product:hover {
            transform: translateY(-5px);
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.1s ease-in-out;
        }
        .card.selected {
            background-color: red;
        }


        
    </style>
@endpush

@section('content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{!! $pages_title !!}</h1>
            </div>
        </div>
    </div>

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                
                <div class="row d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
                    <div class="col-md-12 ">
                        <div class="input-group mb-8">
                            <input type="text" id="search-query" class="form-control" placeholder="Search Product">
                        </div>
                        <div id="product-list-container" class="row"></div>
                    </div>
                </div>
                
                <!--begin::Sidebar-->
                <div class="flex-row-auto w-xl-550px">
                    <div class="card card-flush bg-body" id="kt_pos_form">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-gray-800 fs-2qx">Current Order</h3>
                            <div class="card-toolbar">
                                <a href="javascript:void(0)" onclick="clear_cart()" class="btn btn-light-primary fs-4 fw-bold py-4">Clear All</a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive mb-8">
                                <table class="table align-middle gs-0 gy-4 my-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-cart"></tbody>
                                </table>
                            </div>
                            
                            <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                                <div class="fs-6 fw-bold text-white">
                                    <span class="d-block lh-1 mb-2">Subtotal</span>
                                    <span class="d-block mb-2">Discounts</span>
                                    <span class="d-block mb-9">Tax(12%)</span>
                                    <span class="d-block fs-2qx lh-1">Total</span>
                                </div>
                                <div class="fs-6 fw-bold text-white text-end">
                                    <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$100.50</span>
                                    <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                                    <span class="d-block mb-9" data-kt-pos-element="tax">$11.20</span>
                                    <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">$93.46</span>
                                </div>
                            </div>


                            <div class="m-0">
                                <!--begin::Title-->
                                <h1 class="fw-bold text-gray-800 mb-5">Payment Method</h1>
                                <!--end::Title-->
                                <!--begin::Radio group-->
                                <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                    <!--begin::Radio-->
                                    <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4" data-kt-button="true">
                                        <!--begin::Input-->
                                        <input class="btn-check" type="radio" name="method" value="0" />
                                        <!--end::Input-->
                                        <!--begin::Icon-->
                                        <i class="fonticon-cash-payment fs-2hx mb-2 pe-0"></i>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <span class="fs-7 fw-bold d-block">Cash</span>
                                        <!--end::Title-->
                                    </label>
                                    <!--end::Radio-->
                                    <!--begin::Radio-->
                                    <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 active" data-kt-button="true">
                                        <!--begin::Input-->
                                        <input class="btn-check" type="radio" name="method" value="1" />
                                        <!--end::Input-->
                                        <!--begin::Icon-->
                                        <i class="fonticon-card fs-2hx mb-2 pe-0"></i>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <span class="fs-7 fw-bold d-block">Card</span>
                                        <!--end::Title-->
                                    </label>
                                    <!--end::Radio-->
                                    <!--begin::Radio-->
                                    <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4" data-kt-button="true">
                                        <!--begin::Input-->
                                        <input class="btn-check" type="radio" name="method" value="2" />
                                        <!--end::Input-->
                                        <!--begin::Icon-->
                                        <i class="fonticon-mobile-payment fs-2hx mb-2 pe-0"></i>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <span class="fs-7 fw-bold d-block">E-Wallet</span>
                                        <!--end::Title-->
                                    </label>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Radio group-->
                                <!--begin::Actions-->
                                <button class="btn btn-primary fs-1 w-100 py-4">Print Bills</button>
                                <!--end::Actions-->
                            </div>
                            <!--end::Payment Method-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<!--begin::Vendors Javascript(used for this page only)-->
@push('private_js')
    <script>
        // define variables for search and filter parameters
        let searchQuery = '';
        let filterType = '';

        $(document).ready(function() {
            getProductList();
        });

        // define function to get product list from API
        const getProductList = () => {
            axios.get('/api/products', {
                params: {
                    search: searchQuery,
                    filter: filterType
                }
            })
            .then(response => {
                // remove previous product cards from the container
                $('#product-list-container').empty();
                // loop through the product data and add new cards to the container
                response.data.data.forEach(product => {
                    var formatted_price = IDRCurrency(product.selling_price);
                    let cardHtml = `
                        <div class="col-md-3 mb-4">
                            <a href="javascript:void(0)" class="text-black">
                                <div onclick="add_to_cart(this)" class="card card-product" id="${product.id}">
                                    <img class="card-img-top" src="${product.assets_absolute_path}" alt="${product.name}">
                                    <div class="card-body card-hightlight" id="hightlight_id_${product.id}">
                                        <h5 class="card-title product-name">${product.name}</h5>
                                        <p class="card-text product text-center text-grey fw-semibold d-block fs-6 mt-n1">${product.product_type_name}</p>
                                        <p class="card-text product-price text-center text-end fw-bold fs-1" price="${product.selling_price}" >${formatted_price}</p>
                                        <p class="card-text product-stock text-center fw-bold">${product.stock}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                    $('#product-list-container').append(cardHtml);
                });
            })
            .catch(error => {
                $('#product-list-container').html('<p>Product not available.</p>');
            });
        };

        function add_to_cart(element){
            // Get data
            var product_id = element.id;
            var product_image = element.children[0].src;
            var product_name = element.querySelector('.product-name').textContent;
            var product_price = element.querySelector('.product-price').getAttribute('price');
            var formated_price = element.querySelector('.product-price').textContent;
            var product_stock = element.querySelector('.product-stock').textContent;            

            const existingItem = $(`#item-cart tr[data-id="${product_id}"]`);

             // If the product is already in the cart, update the quantity
            if (existingItem.length) {
                return
            }

            let item = `
                <tr data-kt-pos-element="item" data-id="${product_id}">
                    <td class="pe-0">
                        <div class="d-flex align-items-center">
                        <img src="${product_image}" class="w-50px h-50px rounded-3 me-3" alt="">
                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">${product_name}</span>
                        </div>
                    </td>
                    <td class="pe-0">
                        <div class="input-qty input-group input-group-sm">
                            <button class="btn btn-sm btn-outline-secondary" onclick="decreased_qty('${product_id}')" type="button" data-quantity="minus" data-field="quantity">
                                <i class="fa fa-duotone fa-minus"></i>
                            </button>
                            <input type="text" id="quantity_${product_id}" onkeyup="input_qty('${product_id}')" name="quantity" class="form-control input-number text-center" value="1" min="1" max="${product_stock}">
                            <button class="btn btn-sm btn-outline-secondary" onclick="increased_qty('${product_id}')" type="button" data-quantity="plus" data-field="quantity">
                                <i class="fa fa-duotone fa-plus"></i>
                            </button>
                        </div>
                    </td>
                    <td class="text-end">
                        <span class="fw-bold text-primary fs-2" price="${product_price}" >${formated_price}</span>
                    </td>
                </tr>
            `;
            // Add highlight to the corresponding div
            $(`#hightlight_id_${product_id}`).addClass('bg-primary text-white');

            $("#item-cart").append(item);
        }

        function clear_cart(){
            const item = $(`#item-cart`);
            item.empty();
            $('.card-hightlight').removeClass('bg-primary text-white');
        }

        function increased_qty(id){
            var $input = $("#quantity_"+id);
            var quantity = parseInt($input.val());
            var quantityMax = parseInt($input.attr('max'));

            if (quantity < quantityMax) {
                $input.val(quantity + 1).trigger('change');
            }
        }
        
        function decreased_qty(id){
            var $input = $("#quantity_"+id);
            var quantity = parseInt($input.val());
            var quantityMin = parseInt($input.attr('min'));
    
            if (quantity > quantityMin) {
                $input.val(quantity - 1).trigger('change');
            }
        }

        function input_qty(id){
            var $input = $("#quantity_"+id);
            var quantity = parseInt($input.val());
            var quantityMin = parseInt($input.attr('min'));
            var quantityMax = parseInt($input.attr('max'));

            // check if input is a valid number
            if (isNaN(quantity)) {
                quantity = quantityMin;
            }

            // limit input value to min and max values
            if (quantity < quantityMin) {
                quantity = quantityMin;
            }
            if (quantity > quantityMax) {
                quantity = quantityMax;
            }

            $input.val(quantity);
        }

    </script>
@endpush