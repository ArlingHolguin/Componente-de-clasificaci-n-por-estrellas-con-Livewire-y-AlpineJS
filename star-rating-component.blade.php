
<div class="flex w-full justify-center items-center">
    <div x-data="{
        rating: @entangle('rating'),
        hoverRating: 0,
        ratings: [{ 'amount': 1 }, { 'amount': 2 }, { 'amount': 3 }, { 'amount': 4 }, { 'amount': 5 }],
        rate(amount) {
            if (this.rating == amount) {
                this.rating = 0;
            } else this.rating = amount;
        },
    }"
    x-init="hoverRating = rating"
        class="flex flex-col items-center justify-center space-y-2 rounded w-full bg-gray-200 mx-auto">
        <div class="my-2">
            Average rating: <b>{{ $average_rating }} / 5 ({{ $total_ratings }} votes)</b>
        </div>
        <div class="flex space-x-0 bg-gray-100">
            <template x-for="(star, index) in ratings" :key="index">
                @auth
                    <button @click="rate(star.amount)" @mouseover="hoverRating = star.amount"
                        @mouseleave="hoverRating = rating" aria-hidden="true"
                        class="rounded-sm fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer"
                        :class="{'text-gray-600': hoverRating >= star.amount, 'text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                        <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </button>
                @else
                    <button @click="Livewire.emitTo('internal.login-register-component','showModal')"
                        @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating" aria-hidden="true"
                        class="rounded-sm text-gray-400 fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer"
                        :class="{'text-gray-600': hoverRating >= star.amount, 'text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                        <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </button>
                @endauth
            </template>
        </div>
    </div>
</div>

