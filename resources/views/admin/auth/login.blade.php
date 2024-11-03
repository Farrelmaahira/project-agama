<x-layouts.blank>
    <div class="h-screen w-full relative ">
        <div class="md:w-[32rem] md:h-[28rem] w-[20rem] min-h-[22rem]  shadow-md drop-shadow shadow-gray-200 md:rounded-2xl rounded-md p-6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white">
            <h1 class="md:text-4xl text-2xl text-center font-extrabold text-gray-800 ">
                Login
            </h1>
            <form class="md:my-10 my-4 w-full text-center" action={{ route('admin.signin')}} method="POST">
                @csrf
                @method('post')
                <label class="form-control w-full max-w-5xl mb-6 text-gray-800">
                    <div class="label">
                        <span class="label-text">Input yout email</span>
                    </div>
                    <input type="text" placeholder="Email" class="w-full py-2 px-1 max-w-5xl bg-white outline-none border-b-2 border-gray-400" name="username"/>
                </label>
                <label class="form-control w-full max-w-5xl mb-6 text-gray-800">
                    <div class="label">
                        <span class="label-text">Input your password!</span>
                    </div>
                    <input type="password" placeholder="Password" class="w-full py-2 px-1 max-w-5xl bg-white outline-none border-b-2 border-gray-400" name="password"/>
                </label>
                <button class="btn bg-primary text-white hover:text-primary hover:bg-tertiary w-32  text-lg font-bold rounded-full md:my-10 my-4" type="submit">
                    Login
                </button>
            </form>
        </div>
        <img src="/images/gradient-bg.png" alt="wave" class="w-full h-[100dvh] object-cover"/>
    </div>
</x-layouts.blank>
