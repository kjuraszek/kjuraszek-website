<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tag;
use DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clearDb();
        $projects_raw = json_decode(file_get_contents(public_path() . "/data/projects.json"), true);
        $tags = $this->createTags($projects_raw);
        $projects = $this->createProjects($projects_raw, $tags);
        $this->command->info("Added projects: " . count($projects) . "\nAdded tags: " . count($tags));
    }

    /**
     * Clear the database.
     *
     * @return void
     */
    private function clearDb()
    {
        DB::table('project_tag')->truncate();
        Project::truncate();
        Tag::truncate();
    }

    /**
     * Add tags to the database.
     *
     * @return array
     */
    private function createTags($projects)
    {
        $tags = array();
        foreach ($projects as $project)
        {   
            $tags_raw = $project["tags"];
            foreach ($tags_raw as $index => $tag_raw)
            {
                $tags[] = $tag_raw;
            }
        }
        $tags = array_unique($tags);
        sort($tags);
        $added_tags = array();
        foreach ($tags as $tag)
        {
            $new_tag = new Tag;
            $new_tag->name = $tag;
            $new_tag->save();
            $added_tags[$tag] = $new_tag->id;
        }
        return $added_tags;
    }

    /**
     * Add projects to the database.
     *
     * @return array
     */
    private function createProjects($projects, $tags)
    {
        $added_projects = array();
        foreach ($projects as $project)
        {   
            $new_project = new Project;
            $new_project->title = $project['title'];
            $new_project->image = $project['image'];
            $new_project->desc = $project['desc'];
            $new_project->github = $project['github'] ? $project['github'] : '';
            $new_project->demo = $project['demo'] ? $project['demo'] : '';
            $new_project->progress = $project['progress'];
            $new_project->save();
            $tags_for_project = $this->getTagsIdsForProject($project['tags'], $tags);
            $new_project->tags()->attach($tags_for_project);
            $added_projects[$project['title']] = $new_project->id;
        }
        return $added_projects;
    }

    /**
     * Add projects to the database.
     *
     * @return array
     */
    private function getTagsIdsForProject($project_tags, $tags)
    {
        $tags_ids = array();
        foreach ($project_tags as $tag)
        {
            $tags_ids[] = $tags[$tag];
        }
        return $tags_ids;
    }
}
