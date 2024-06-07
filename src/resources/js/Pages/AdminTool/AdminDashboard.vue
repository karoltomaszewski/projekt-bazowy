<script>

    export default {
        props: {
            users: Object,
        },
    }
</script>

<template>
    <div class="mb-4">
        <h1 class="text-4xl">Admin Tool</h1>
    </div>
    <div>
        <a :href="route('admin.users')">Użytkownicy</a><br />
        <a :href="route('admin.permissions')">Role i uprawnienia</a><br />
        <a :href="route('dashboard')">Powrót do strony głównej</a>
    </div>
</template>
