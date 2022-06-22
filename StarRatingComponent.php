
<?php

namespace App\Http\Livewire\Pro;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class StarRatingComponent extends Component
{
    public $rating = 0, $previousRating = 0;
    public Model $model;

    public function mount()
    {
        if (auth()->check()) {
            $this->rating = $this->ratings_query->first()->rating ?? 0;
            $this->previousRating = $this->rating;
        }
    }

    public function render()
    {
        return view('livewire.pro.star-rating-component', [
            'total_ratings' => $this->total_ratings,
            'average_rating' => $this->average_rating,
        ]);
    }

    public function updatedRating()
    {
        if ($this->rating == 0) {
            $this->ratings_query->where('rating', $this->previousRating)->delete();

            $this->reset([
                'rating',
            ]);

            return;
        }

        $this->model->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'rating' => $this->rating,
            ]
        );

        $this->previousRating = $this->rating;
    }

    public function getAverageRatingProperty()
    {
        return number_format($this->model->ratings()->avg('rating'), 1);
    }

    public function getTotalRatingsProperty()
    {
        $this->model->refresh();

        return $this->model->ratings->count();
    }

    public function getRatingsQueryProperty()
    {
        return auth()->user()->rating()->where('rateable_type', get_class($this->model))->where('rateable_id', $this->model->id);
    }
}


