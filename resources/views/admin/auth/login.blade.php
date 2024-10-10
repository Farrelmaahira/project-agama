<x-layouts.blank>
    <div class="h-screen relative">
        <div class="md:w-[32rem] md:h-[28rem] w-[20rem] min-h-[22rem] shadow-md drop-shadow shadow-gray-200 md:rounded-2xl rounded-md p-6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white">
            <h1 class="md:text-3xl text-2xl font-bold text-gray-800 ">
                Login to your account!
            </h1>
            <form class="md:my-10 my-4 w-full">
                @csrf
                <label class="form-control w-full max-w-5xl mb-6 text-gray-800">
                    <div class="label">
                        <span class="label-text">input your email!</span>
                    </div>
                    <input type="text" placeholder="Type your email here" class="input input-bordered w-full max-w-5xl" />
                </label>
                <label class="form-control w-full max-w-5xl mb-6 text-gray-800">
                    <div class="label">
                        <span class="label-text">input your password!</span>
                    </div>
                    <input type="password" placeholder="Type your password here" class="input input-bordered w-full max-w-5xl" />
                </label>
                <button class="btn bg-gray-800 text-white text-lg font-bold rounded-full w-full md:my-10 my-4">
                    Login
                </button>
            </form>
        </div>
        <img src="/images/background.png" alt="wave" class="w-full h-screen object-cover  md:hidden"/>
    </div>
</x-layouts.blank>
