<script>

</script>

<template>
    <div class="mb-4">
        <h1 class="text-4xl">Dashboard</h1>
    </div>
    <div>
        <a :href="route('admin')" v-if="this.$hasAccess('admin_tool_access')">Admin tool</a> <br>
        <a :href="route('logout')">Wyloguj się</a>
    </div>
</template>
