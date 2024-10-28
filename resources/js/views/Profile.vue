<template>
    <h1 class="bg-red-700 border-b-8 border-black p-6">
        <div class="flex justify-between">
            <div class="bg-green-600 font-extrabold">Welcome to the first iteration of MIC.com</div>
            <div class="text-white text-center">MIC.COM</div>
            <div class="Profile flex">
                <div class="text-white text-center p-2">Logged in as:</div>
                <img class="rounded-full" src="/public/images/vegeta.png" width="45px" alt="profilePic"/>
            </div>
        </div>
    </h1>
    <body>
        <div class="min-h-screen bg-gradient-to-b from-blue-800 via-blue-300 to-yellow-500 p-28">
            <div>To Do</div>
            <form action="/api/saveTask" method="post" accept-charset="UTF-8">
             <!-- {{  csrf_field }} -->
                <input type="text" placeholder="new Task"/>
                <button type="submit">Add to List</button>
            </form>
            <div class ="border-4 border-black text-center">
                Hi
            </div>
        </div>
    </body>
</template>

<script>
export default {
    name: "Profile",

    }




</script>
