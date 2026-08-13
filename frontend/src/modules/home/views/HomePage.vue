<script setup>
import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue';
import HeroBanner from '../components/HeroBanner.vue'
import Category from '../components/Category.vue';
import FeaturedProducts from '../components/FeaturedProducts.vue';
import PromotionBanner from '../components/PromotionBanner.vue';
import TrustSection from '../components/TrustSection.vue';
import BestSeller from '../components/BestSeller.vue';
import CTA from '../components/CTA.vue';

</script>

<template>
    <AppHeader />
    <HeroBanner image="https://bizweb.dktcdn.net/100/493/453/themes/925745/assets/slider_1.jpg?1720748105853"
        title="Tượng gỗ phong thủy cao cấp" subtitle="Mang tài lộc - vượng khí - bình an" />
    <Category />
    <FeaturedProducts />
    <PromotionBanner />
    <TrustSection />
    <BestSeller />
    <CTA />
    <AppFooter />

</template>