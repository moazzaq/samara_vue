<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post,index) in posts" :key="post.id">
                <th scope="row">{{ index+1 }}</th>
                <td>{{ post.post_title }}</td>
                <td>{{ post.content }}</td>
                <td>Action</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Index",
   // props : ['posts'],
    data(){
      return {
          posts : [],
      }
    },
    created() {
      this.getPosts()
    },
    methods : {
        getPosts(){
            axios.get('/api/all-posts').then(res => {
               // console.log(res.data)
                this.posts = res.data.data
            }).catch(error => {
                console.log(error)
            })
        }
    },
}
</script>

<style scoped>

</style>
