<template>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
            <th scope="col">Active</th>
            <th scope="col">Action</th>
            </tr>
      </thead>
      <tbody>
            <tr v-for="(lists, index) in post" :key="index">
            <th scope="row"></th>
            <td>{{ post.title }}</td>
            <td>{{ post.body }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="" class="btn btn-info btn-sm">
                    <i class="fas fa-edit fa-sm"></i>
                </a>
                <button class="btn btn-danger btn-sm delete-category">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
    import { ref, onMounted, computed } from 'vue';
    let posts = ref({});
    function getPosts(){
        axios.get('posts/all').then(response => {
            posts = response.data;
        })
    }

    const lists = computed(() => {
      return posts.data;
    })

    onMounted(() => {
        getPosts()
    });
</script>