<template>
<div class="row">

    <div class="col-6">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">Unsync ALDI</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#modal-lg">Wiki</button>

                </div>

                <!-- /.card-header -->

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-4">

                        <div class="input-group input-group-sm">

                            <select class="form-control" v-model='range'>

                                <option value="" selected disabled hidden>Select date</option>

                                <option>Sysdate-1</option>

                                <option>Sysdate-7</option>

                            </select>

                            <span class="input-group-append">

                                <button type="button" @click='showContract()' class="btn btn-success btn-flat">Go!</button>

                            </span>

                        </div>

                    </div>

                </div>

                <br>

                <table class="table table-bordered">

                    <tbody>

                        <tr>

                            <th style="width: 10px">#</th>

                            <th>CONTRACT NUMBER</th>

                            <th>STATUS DESC</th>

                            <th>CREATED DATE</th>

                        </tr>

                        <tr v-for="(result, index) in result" :key="result.contract_number">

                            <td>{{index}}</td>

                            <td>{{ result.CONTRACT_NUMBER }}</td>

                            <td>{{ result.STATUS_DESC}}</td>

                            <td>{{ result.CREATED_DATE }}</td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- /.card-body -->

            <!-- /.MODAL -->

            <div class="modal fade" id="modal-lg">

                <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h4 class="modal-title">Section Info</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                        <div class="modal-body">

                            <p>KBASE</p>

                        </div>

                        <div class="modal-footer justify-content-between">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>

                    </div>

                    <!-- /.modal-content -->

                </div>

                <!-- /.modal-dialog -->

            </div>

            <!-- /.modal -->

        </div>

    </div>

    <div class="col-md-6">

        <div class="card card-warning">

            <div class="card-header">

                <h3 class="card-title">Contract Sync Result</h3>

            </div>

            <!-- /.card-header -->

            <!-- form start -->

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Result</th>
                        </tr>
                        <tr v-for="user in users" v-bind:key="user">
                            <td>{{ users.Hit }}</td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">

                <button type="button" @click='executeContract()' class="btn btn-danger btn-sm float-right">Execute!</button>

            </div>

            <!-- /.card-footer -->

        </div>

    </div>

</div>
</template>

<script>
export default {

    data() {
        return {
            result: [],
            range: '',
            users: [],
        }
    },

    methods: {
        showContract: function () {
            axios.get('http://10.56.45.133/itoperation/laraAPI/mobile/unsyncAldi.php', {
                    params: {
                        range: this.range
                    }
                })
                .then(response => {
                    this.result = response.data;
                    this.$vToastify.success("Data berhasil diambil");
                })
                .catch(function (error) {
                    console.log(error.response);
                    fetch().then().catch(error => this.$vToastify.error(error));

                });
        },

        executeContract: function () {
            axios.get('http://10.56.45.133/itoperation/laraAPI/mobile/soap_unsync.php', {})
                .then(response => {
                    this.users = response.data;
                    this.$vToastify.success("Unsync Data Berhasil");
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>
