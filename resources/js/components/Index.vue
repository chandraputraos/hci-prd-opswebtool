<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">POSTS</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'create' }" class="btn btn-md btn-success">TAMBAH POST</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>TITLE</th>
                                    <th>KONTEN</th>
                                    <th>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="post in posts" :key="post.user_id">
                                    <td>{{ post.user_name }}</td>
                                    <td>{{ post.user_email }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'edit', params: { id: post.user_id }}" class="btn btn-sm btn-primary">EDIT</router-link>
                                        <button @click.prevent="PostDelete(post.user_id)" class="btn btn-sm btn-danger">HAPUS</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        created() {
            let uri = `http://localhost:8080/hdreg/files/api/user_admin.php`;
            this.axios.get(uri).then(response => {
                this.posts = response.data  ;
            }).catch((e) => {
            console.log(e);
        }); 
        }
    }
</script>