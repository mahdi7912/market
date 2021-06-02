<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
          integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.font-store.ir/behdad.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vue-slider-component@latest/theme/default.css">
    <style>
        * {
            font-family: behdad !important;
            direction: rtl;
        }
    </style>
    <title>Document</title>
</head>
<body style="background-color: #00d2d3">
<div class="container-fluid" id="app">
    <div class="row justify-content-center mt-5">
        <div class="mb-4 col-12 text-center">
            <h2 class="text-white"><b>محصولات</b> <b>{{ $user->name }}</b></h2>
        </div>
        <div class="col-12 col-lg-6 p-2 rounded shadow-lg" style="background-color: #fff">
            <form method="post">
                @csrf
                <input v-model="phone" type="text" class="form-control my-2" placeholder="شماره تلفن">
                <input v-model="name" type="text" class="form-control my-2" placeholder="نام و نام خانوادگی">
                <div class="d-flex justify-content-center">
                    <div class="rounded shadow text-white px-5 py-2" style="background-color: #00d2d3">
                        <h5 class="py-0 my-0">لیست خرید</h5>
                    </div>
                </div>
                <div class="alert mt-2 alert-info">هر چه حجم خرید شما بیشتر باشد میزان تخفیف هم بیشتر خواهد بود.</div>
                <table class="mt-3 table table-striped table-hover">
                    <tr>
                        <td>نام محصول</td>
                        <td>قیمت با توجه به حجم خرید</td>
                        <td>قیمت واحد</td>
                        <td>حجم خرید</td>
                    </tr>
                    <tr v-for="list in lists">
                        <td>@{{ list.product.name }}</td>
                        <td>@{{ calculatePrice(list) }}</td>
                        <td>@{{ calculateFee(list) }}</td>
                        <td>
                            <vue-slider
                                ref="slider"
                                v-model="value[list.id]"
                                :options="{tooltip: 'always'}"
                                :min="list.min_num"
                                :max="list.max_num"
                            ></vue-slider>
                            <div class="d-block  mt-2">
                                <input type="number" class="form-control" placeholder="حجم خرید" v-model="value[list.id]">
                            </div>
                        </td>
                    </tr>
                </table>
                <button @click.prevent="save" class="btn btn-primary btn-block btn-sm">ثبت</button>
                <div v-if="message" class="alert mt-2 alert-info">@{{ message }}</div>
            </form>
        </div>
    </div>

    <div
        style="position:fixed;left: 0;bottom: 0;background-color: tomato;"
        class="p-3 w-100 font-weight-bold text-center text-white"
        v-if="total > 0">
        <span>مجموع خرید شما</span>
        <span> : </span>
        <span>@{{ total }}</span>
        <span> هزار تومان</span>
    </div>

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-slider-component@latest/dist/vue-slider-component.umd.min.js"></script>
<script>
    let app = new Vue({
        el: '#app',
        data: {
            lists: @json($lists),
            value: {},
            phone: '',
            name: '',
            csrf: '{{ csrf_token() }}',
            message: false
        },
        computed: {
            total() {
                let t = 0
                for (let list of this.lists) {
                    if(this.value[list.id])
                        t += this.calculatePrice(list)
                }
                return t
            }
        },
        methods: {
            calculatePrice(list) {
                if (!this.value[list.id]) return 0;

                let m = (-list.max_price + list.min_price) / (list.max_num - list.min_num);
                let arz = list.min_price - (list.max_num * m);
                let price = (m * this.value[list.id]) + arz;
                price = Math.ceil(price)

                return this.value[list.id] * price;
            },
            calculateFee(list) {
                if (!this.value[list.id]) return 0;

                let m = (-list.max_price + list.min_price) / (list.max_num - list.min_num);
                let arz = list.min_price - (list.max_num * m);
                let price = (m * this.value[list.id]) + arz;
                price = Math.ceil(price)

                return price === 0 ? list.min_price : price;
            },
            save() {
                axios.post(window.location, {
                    ids: this.value,
                    phone: this.phone,
                    name: this.name,
                    user_id: this.lists[0].user_id,
                    total: this.total,
                    _token: this.csrf
                }).then(response => {
                    this.message = response.data.message
                    this.value = {}
                })
            }
        },
        components: {
            VueSlider: window['vue-slider-component']
        }
    })
</script>

</html>
