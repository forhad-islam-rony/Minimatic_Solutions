<template>
    <div>
        <div class="wishlist__icon">
            <span
                class="wishlist material-icons"
                id="myInput"
                @click="openModel"
                v-text="buttonText"
            ></span>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="wishlistDate">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Future Purchase Date</h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Select Future Purchase Date :
                            <input
                                type="date"
                                name="date"
                                min="2022-06-20"
                                value="2022-06-21"
                                id="date"
                                required
                            />
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            @click="wishlistAdd"
                            class="btn btn-primary"
                            data-dismiss="modal"
                        >
                            Add to Wishlist
                        </button>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["productId", "inWishlist"],

    mounted() {
        console.log("Component mounted.");
    },

    data: function () {
        return {
            status: this.inWishlist,
        };
    },
    methods: {
        openModel() {
            this.status == false
                ? $("#wishlistDate").modal("show")
                : this.wishlistAdd();
        },
        wishlistAdd() {
            axios
                .post("/wishlist/" + this.productId, {
                    _method: "patch",
                    _token: "{{ csrf_token() }}",
                    additionals_features: "2020-05-21",
                })
                .then((response) => {
                    if (response.data.status == "ok") {
                        this.status = !this.status;
                        toastr.success(response.data.message);
                    } else {
                        toastr.error(response.data.message);
                    }
                })
                .catch((error) => {
                    console.log(error.data);
                });
        },
    },

    computed: {
        buttonText() {
            return this.status ? "favorite" : "favorite_border";
        },
    },
};
</script>
