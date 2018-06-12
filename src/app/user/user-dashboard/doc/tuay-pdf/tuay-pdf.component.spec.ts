import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TuayPdfComponent } from './tuay-pdf.component';

describe('TuayPdfComponent', () => {
  let component: TuayPdfComponent;
  let fixture: ComponentFixture<TuayPdfComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TuayPdfComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TuayPdfComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
