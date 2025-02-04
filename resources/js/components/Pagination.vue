<template>
    <div class="pagination-area orange-color text-center mt-3 md-mt-0">
        <ul class="pagination-part">
            <li><a :href="props.pagination.next_Page_url">Previous <i class="fa fa-long-arrow-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a :href="props.pagination.next_Page_url">Next <i class="fa fa-long-arrow-right"></i></a></li>
        </ul>
    </div>
</template>

<script setup>
    const props = defineProps(['pagination'])
</script>
