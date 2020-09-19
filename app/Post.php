<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use Sluggable;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    const IS_STANDARD = 0;
    const IS_FEATURED = 1;

    protected $fillable = ['title', 'content', 'date', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        if ($this->image) Storage::delete('uploads/'.$this->image);
        $this->delete();
    }

    public function uploadImage($image)
    {
        if (!$image) return;

        if ($this->image) Storage::delete('uploads/'.$this->image);
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        return $this->image ? '/uploads/' . $this->image : '/img/no-image.jpg';
    }

    public function setCategory($id)
    {
        if (!$id) return;

        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if (!$ids) return;

        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = self::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = self::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        return $value ? $this->setPublic() : $this->setDraft();
    }

    public function setFeatured()
    {
        $this->is_featured = self::IS_FEATURED;
        $this->save();
    }

    public function setStandard()
    {
        $this->is_featured = self::IS_STANDARD;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        return $value ? $this->setFeatured() : $this->setStandard();
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
    }

    public function getTagsTitles()
    {
        return $this->tags ? implode(', ', $this->tags->pluck('title')->all()) : '';
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postId = $this->hasPrevious();

        return self::find($postId);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postId = $this->hasNext();

        return self::find($postId);
    }

    public function related()
    {
        return self::where('category_id', $this->category_id)->get()->except($this->id);
    }
}
