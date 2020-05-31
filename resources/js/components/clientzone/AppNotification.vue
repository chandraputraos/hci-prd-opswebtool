<template>
<div class="row">
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">APPLICATION NOTIFICATION</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#modal-lg">Wiki</button>

                </div>
                <!-- /.card-header -->

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm">
                  <input type="text" class="form-control" v-model='contract' placeholder="Contract Number">
                  <span class="input-group-append">
                    <button type="button"  @click='showByID()' class="btn btn-info btn-flat" >Go!</button>
                  </span>
                </div>
                    </div>

                </div>

                <br>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>CONTRACT CODE</th>
                            <th>NOTIFICATION TYPE</th>
                            <th>NOTIFICATION DTIME</th>
                            

                        </tr>
                        <tr v-for="(result, index) in result" :key="result.code">
                            <td>{{index}}</td>
                            <td>{{ result.CONTRACT_CODE }}</td>
                            <td>{{ result.NOTIFICATION_TYPE }}</td>
                            <td>{{ result.NOTIFICATION_DTIME}}</td>
                           

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
</div>
</template>

<script>
export default {

    data() {
        return {
            result: [],
            contract: ''

        }

    },

    methods: {

        showByID: function () {

            axios.get('http://10.56.45.133/itoperation/laraAPI/clientzone/application_notification.php', {
                    params: {

                        contract: this.contract

                    }
                })
                .then(response => {
                    this.result = response.data;
                })
                .catch(function (error) {
                    console.log(error.response);
                });

        }
    }
}
</script>
