<x-site-layout>

    <div class="mx-auto px-4 py-16 sm:px-6 lg:px-8 ">
        <div class="mx-auto max-w-lg text-center">
            <h1 class="text-2xl font-bold sm:text-3xl">Get started today!</h1>

        </div>

        <form action="{{route('project.store')}}" method="POST" class="mx-auto mt-8 mb-0 max-w-md space-y-4">
            @csrf
            <div>
                <label for="github_profile" class="sr-only">github profile</label>

                <div class="relative">
                    <input name="github_profile" type="text"
                        class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm @error('github_profile') border-red-500 @enderror"
                        placeholder="like: geeksesi" />
                    @error('github_profile')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div>
                <label for="url" class="sr-only">request url</label>

                <div class="relative">
                    <input name="url" type="text"
                        class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm @error('url') border-red-500 @enderror"
                        placeholder="url of pull request, issue, repository" />
                    @error('url')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div>
                <label for="title" class="sr-only">title of request</label>

                <div class="relative">
                    <input name="title" type="text"
                        class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm @error('title') border-red-500 @enderror"
                        placeholder="describe short" />
                    @error('title')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div>
                <label for="body" class="sr-only">description</label>

                <div class="relative">
                    <textarea name="body"
                        class="w-full rounded-lg border-gray-200 p-3 text-sm @error('body') border-red-500 @enderror"
                        placeholder="describe situation and what you need" rows="8">
                    </textarea>
                    @error('body')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">
                    Need help?
                    <a class="underline" href="https://github.com/geeksesi/review-as-a-service/issues">ask question</a>
                </p>

                <button type="submit"
                    class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                    Submit review request
                </button>
            </div>
        </form>
    </div>
</x-site-layout>
