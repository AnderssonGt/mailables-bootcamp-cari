<section class=" relative flex flex-wrap lg:h-screen lg:items-center">
	<div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
			<div class="mx-auto max-w-lg text-center">
				<h1 class="text-2xl font-bold sm:text-3xl">Get started today!</h1>
	
				<p class="mt-4 text-gray-500">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla
					eaque error neque ipsa culpa autem, at itaque nostrum!
				</p>
			</div>
	
			<form action="{{route('bootcamp.send')}}" method="POST" class=" mx-auto mb-0 mt-8 max-w-md space-y-4">
				@csrf
				<label for="recipient"
					class="@error('to') border-red-500 @enderror relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
					<input type="text" id="recipient" name="recipient" value="{{ old('recipient') }}"
						class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
						placeholder="recipient" />
	
					<span
						class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
						Recipient
					</span>
					<span class="absolute inset-y-0 end-0 grid place-content-center px-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
					</span>
				</label>
				@error('recipient') <p class="text-red-500">* El campo Email debe contener un <b>@</b></p> @enderror

				<label for="subject"
					class="@error('subject') border-red-500 @enderror relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
					<input type="text" id="subject" name="subject" value="{{ old('subject') }}"
						class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
						placeholder="subject" />
					<span
						class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
						Subject
					</span>
				</label>
				@error('subject') <p class="text-red-500">* El campo <b>Name</b> es requerido</p> @enderror
	
				<label for="comment"
					class="@error('comment') border-red-500 @enderror relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
					<textarea placeholder="Enter comment" id="comment" name="comment"
						class="w-full h-32 resize-none rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0">{{ old('comment') }}</textarea>
					<span
						class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
						Comment
					</span>
				</label>
				@error('comment') <p class="text-red-500">* El campo <b>Comment</b> es requerido</p> @enderror

				<div class="flex items-center justify-center">
					<button type="submit"
						class="inline-block w-screen duration-300 hover:bg-blue-700 ease-in-out to-lime-950 rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
						<p class="text-lg">send</p>
					</button>
				</div>
			</form>
		</div>

		
	<div class="relative  h-screen w-full lg:w-1/2">
		<img alt="Welcome" src="https://plexapps.blob.core.windows.net/local/bootcapm-cari.jpg"
			class="absolute inset-0 h-full w-full object-cover" />
	</div>

	@if (session('info'))
		<button x-data hidden="true" x-init="$nextTick(() => { $dispatch('notice', { type: 'success', text: '🚀 Mail enviado 🚀' }) })"
            class="m-4 bg-green-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
            Success
        </button>

        <div x-data="noticesHandler()" class="absolute right-0 top-2" @notice.window="add($event.detail)"
            style="pointer-events:none">
            <template x-for="notice of notices" :key="notice.id">
                <div x-show="visible.includes(notice)" x-transition:enter="transition ease-in duration-200"
                    x-transition:enter-start="transform opacity-0 translate-y-2"
                    x-transition:enter-end="transform opacity-100" x-transition:leave="transition ease-out duration-3000"
                    x-transition:leave-start="transform  opacity-100"
                    x-transition:leave-end="transform  opacity-0" @click="remove(notice.id)"
                    class="rounded mb-4 mr-6 w-56  h-16 flex items-center justify-center text-white shadow-lg font-bold text-lg cursor-pointer"
                    :class="{
                        'bg-green-500': notice.type === 'success',
                    }"
                    style="pointer-events:all" x-text="notice.text">
                </div>
            </template>
        </div>

        <script>
            function noticesHandler() {
                return {
                    notices: [],
                    visible: [],
                    add(notice) {
                        notice.id = Date.now()
                        this.notices.push(notice)
                        this.fire(notice.id)
                    },
                    fire(id) {
                        this.visible.push(this.notices.find(notice => notice.id == id))
                        const timeShown = 2000 * this.visible.length
                        setTimeout(() => {
                            this.remove(id)
                        }, timeShown)
                    },
                    remove(id) {
                        const notice = this.visible.find(notice => notice.id == id)
                        const index = this.visible.indexOf(notice)
                        this.visible.splice(index, 1)
                    },
                }
            }
        </script>
		@endif
</section>