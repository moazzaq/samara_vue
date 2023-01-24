<template>
    <div>
        <button @click="openForm" class="btn btn-dark">Add New Post</button>
      <create v-if="open"></create>
        <edit v-if="editing"></edit>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post,index) in posts" :key="post.id">
                <th scope="row">{{ index+1 }}</th>
                <td>{{ post.post_title }}</td>
                <td>{{ post.content }}</td>
                <td>{{ post.post_created }}</td>
                <td>
                    <button class="btn btn-outline-primary" @click.prevent="Edit(post.id)">Edit</button>
                    <button class="btn btn-danger" @click.prevent="Delete(post.id)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Create from "./Create";
import Edit from "./Edit";
export default {
    name: "Index",
    components: {Edit, Create},
    // props : ['posts'],
    data(){
      return {
          posts : [],
          open : false,
          editing : false,
          // postEdit : {}
      }
    },
    created() {
      this.getPosts();
        this.$root.$on('refreshTable', () => {
            this.getPosts()
        });

        this.$root.$on('hideForm', () => {
            this.editing = false
        });
    },
    methods : {
        getPosts(){
            axios.get('/api/all-posts').then(res => {
                this.posts = res.data.data
            }).catch(error => {
                console.log(error)
            })
        },
        openForm(){
            this.open = !this.open
            this.editing = false
        },
        Delete(id){
           if (confirm('Are you sure')){
               axios.delete(`/posts/${id}`).then(res => {
                   this.getPosts()
               }).catch(error => {
                   console.log(error)
               })
           }
        },
        Edit(id){
            this.editing = true
            this.open = false
            axios.get(`/posts/${id}/edit`).then(res => {
                this.$root.$emit('EditPost', res.data.data)
            }).catch(error => {
                console.log(error)
            })
        }
    },
}
</script>

<style scoped>

</style>
