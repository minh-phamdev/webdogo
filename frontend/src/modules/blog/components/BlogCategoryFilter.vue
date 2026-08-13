<template>
    <div class="blog-categories">
        <button v-for="cat in categories" :key="cat.slug" class="cat-btn"
            :class="{ active: activeCategory === cat.slug }" @click="$emit('select-category', cat.slug)">
            {{ cat.name }}
        </button>
    </div>
</template>

<script setup>
defineProps({
    categories: Array,
    activeCategory: String
})
defineEmits(['select-category'])
</script>

<style scoped>
.blog-categories {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.cat-btn {
    padding: 8px 18px;
    border: 1px solid #e8dfd5;
    background: #ffffff;
    color: #2c1810;
    border-radius: 20px;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s;
}

.cat-btn.active,
.cat-btn:hover {
    background: #2c1810;
    color: #e6c675;
    border-color: #2c1810;
}
</style>