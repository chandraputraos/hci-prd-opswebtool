<template>
    <div class="row">
        <div class="col-12">

                       <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Incoming Payment</h3>
                    <div class="card-tools">
      <button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#modal-lg">Wiki</button>
          
                  
                 
                </div>
                <!-- /.card-header -->
                
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-2"> 
                       <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-at"></i>
                      </span>
                    </div>
                 <input type="text" class="form-control form-control-sm"  v-model='partner_id' placeholder="Channel">
                  </div>              
                        </div>
                        <div >
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                     <datetime format="YYYY-MM-DD H:i:s"  v-model='date'   name='dob2'></datetime>
                  </div>
                        </div>


                         <div  >
                           <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                     <datetime format="YYYY-MM-DD H:i:s"  v-model='date2'   name='dob2'></datetime>
                  </div>
                        </div>


                         <div class="col-md-1">
                        <button type="button" @click='showByID()' class="btn btn-sm btn-success">Search.!</button>
                         </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>PARTNER_ID</th>
                                <th>CRE_TMS</th>
                                <th >CONTRACT_NUMBER</th>
                                 <th>IS_PROCESSED</th>
                                  <th>IS_REVERSED</th>
                                  <th>PAYMENT_TYPE</th>
                                   
                            </tr>
                           <tr v-for="(pgw, index) in pgw" :key="pgw.cre_tms">
                             <td>{{index}}</td>
                                    <td>{{ pgw.PARTNER_ID }}</td>
                                    <td>{{ pgw.CRE_TMS}}</td>
                                    <td>{{ pgw.CONTRACT_NUMBER }}</td>
                                    <td>{{ pgw.IS_PROCESSED }}</td>
                                    <td>{{ pgw.IS_REVERSED }}</td>
                                    <td>{{ pgw.PAYMENT_TYPE }}</td>
                                  
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

import datetime from 'vuejs-datetimepicker'
    export default {
     components: { datetime },
        data() {
            return {
                pgw: [],
                partner_id :"",             
                date :'',
                date2 :''
            }
            
        },        
 
         methods:        
         {              
       
    
       
        showByID: function() {


            axios.get('http://10.56.45.133/itoperation/laraAPI/pgw/incoming.php', {
                    params: {
                      partner_id: this.partner_id,
                        date: this.date,
                        date2: this.date2

                    }
                })
                .then(response => {
                   this.pgw = response.data;
                })
                .catch(function(error) {
                    console.log(error.response);
                });


        }
    }
    }
</script>
