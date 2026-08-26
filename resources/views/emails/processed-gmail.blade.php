<h2>Processed Document</h2>

<p>
    <strong>Customer:</strong>
    {{ $customer }}
</p>

<p>
    <strong>Original Sender:</strong>
    {{ $fromEmail }}
</p>

<p>
    <strong>Original Subject:</strong>
    {{ $originalSubject }}
</p>

<hr>

<p>
    The document has been processed successfully.
</p>

@foreach ($processedResults as $result)

    <h3>
        {{ $result['filename'] }}
    </h3>

    @if (!empty($result['txt_content']))
        <pre style="white-space: pre-wrap;">{{ $result['txt_content'] }}</pre>
    @endif

@endforeach