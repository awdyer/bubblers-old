<template>
<div>
    <div class="card card-block text-xs-center">
        <h4>{{ bubbler.description }}</h4>
        <p>{{ bubbler.park.name }}, {{ bubbler.suburb.name }}</p>
        <em>{{ bubbler.rating }} stars</em>
    </div>
</div>
</template>

<script type="text/babel">
    export default {
        props: ['bubbler']
    };
</script>