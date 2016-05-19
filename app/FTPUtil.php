<?

public function createprojectfile(Project $project)
{
    $date = new DateTime;
    $filename = $project->get('project_name') . '-' . $date->format('mdY');
    $content = $project->get('project_name');

    Storage::disk('local')->put($filename, $contents);
}
