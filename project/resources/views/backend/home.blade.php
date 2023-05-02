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

                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" id="search-query" class="form-control" placeholder="Search Product">
                        </div>
                    </div>


                    <div id="product-list-container" class="row">
                        <!-- product cards will be added dynamically here -->
                    </div>

                    <!--begin::Content-->
                    <!-- @foreach($products as $value)
                        <div class="col-md-3 mb-4">
                            <div class="card card-product">
                                <img class="card-img-top" src="{{ $value->assets_absolute_path }}" alt="{{ $value->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $value->name }}</h5>
                                    <p class="card-text text-center text-gray-400 fw-semibold d-block fs-6 mt-n1">{{ $value->product_type_name }}</p>
                                    <p class="card-text text-center text-success text-end fw-bold fs-1">{{ $value->selling_price }}</p>
                                    <p class="card-text text-center text-primary fw-bold">{{ $value->stock }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach -->
                </div>
                
                <!--begin::Sidebar-->
                <div class="flex-row-auto w-xl-425px">
                    <!--begin::Pos order-->
                    <div class="card card-flush bg-body" id="kt_pos_form">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-gray-800 fs-2qx">Current Order</h3>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="javascript:void(0)" class="btn btn-light-primary fs-4 fw-bold py-4">Clear All</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0">
                            <!--begin::Table container-->
                            <div class="table-responsive mb-8">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr>
                                            <th class="min-w-175px"></th>
                                            <th class="w-125px"></th>
                                            <th class="w-60px"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr data-kt-pos-element="item" data-kt-pos-item-price="33">
                                            <td class="pe-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ URL::asset('assets/media/stock/food/img-2.jpg') }}" class="w-50px h-50px rounded-3 me-3" alt="" />
                                                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">T-Bone Stake</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <!--begin::Dialer-->
                                                <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">
                                                    <!--begin::Decrease control-->
                                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3x">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Decrease control-->
                                                    <!--begin::Input control-->
                                                    <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="2" />
                                                    <!--end::Input control-->
                                                    <!--begin::Increase control-->
                                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3x">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                                                <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Increase control-->
                                                </div>
                                                <!--end::Dialer-->
                                            </td>
                                            <td class="text-end">
                                                <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$66.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                            <!--begin::Summary-->
                            <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                                <!--begin::Content-->
                                <div class="fs-6 fw-bold text-white">
                                    <span class="d-block lh-1 mb-2">Subtotal</span>
                                    <span class="d-block mb-2">Discounts</span>
                                    <span class="d-block mb-9">Tax(12%)</span>
                                    <span class="d-block fs-2qx lh-1">Total</span>
                                </div>
                                <!--end::Content-->
                                <!--begin::Content-->
                                <div class="fs-6 fw-bold text-white text-end">
                                    <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$100.50</span>
                                    <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                                    <span class="d-block mb-9" data-kt-pos-element="tax">$11.20</span>
                                    <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">$93.46</span>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Payment Method-->
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
                        <!--end: Card Body-->
                    </div>
                    <!--end::Pos order-->
                </div>
            </div>
        </div>
    </div>
@endsection


<!--begin::Vendors Javascript(used for this page only)-->
@push('private_js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                let cardHtml = `
                    <div class="col-md-3 mb-4">
                        <div class="card card-product">
                            <img class="card-img-top" src="${product.assets_absolute_path}" alt="${product.name}">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text text-center text-gray-400 fw-semibold d-block fs-6 mt-n1">${product.product_type_name}</p>
                                <p class="card-text text-center text-success text-end fw-bold fs-1">${product.selling_price}</p>
                                <p class="card-text text-center text-primary fw-bold">${product.stock}</p>
                            </div>
                        </div>
                    </div>
                `;
                $('#product-list-container').append(cardHtml);
            });
        })
        .catch(error => {
            // display error message
            $('#product-list-container').html('<p>Product not available.</p>');
        });
    };

    </script>
@endpush